<?php
    class links extends CI_Model
    {
        function get($id = 0)
        {

            $this->db->from("be_links");
            //$this->db->join('be_link_permissions', 'be_links.id = be_link_permissions.link_id', 'left');
            
            $this->db->order_by("be_links.order", "ASC");
            $data = $this->db->get();
            
            $links = array();
            $results = $data->result();
            //print_r($results);
            //die();

            foreach($results as $link_entry)
            {
                if($link_entry->parent != 0 && $id == 0)
                    continue;

                $link['id'] = $link_entry->id;
                $link['name'] = $link_entry->name;
                $link['target'] = $link_entry->target;
                $link['title'] = $link_entry->title; 
                $link['tags'] = trim(str_replace("|", ",", $link_entry->tags), ","); 
                $link['parent'] = $link_entry->parent;
                $link['order'] = $link_entry->order;
                $link['childs'] = array();
                $link['groups'] = $this->get_link_group_ids_array($link_entry->id);
                $link['groups_string'] = $this->get_groups_string($link_entry->id);
                    
                foreach($results as $sublink_entry)
                {
                    if($sublink_entry->parent == 0 || $sublink_entry->parent != $link_entry->id)
                        continue;

                    $sublink['id'] = $sublink_entry->id;
                    $sublink['name'] = $sublink_entry->name;
                    $sublink['target'] = $sublink_entry->target;
                    $sublink['title'] = $sublink_entry->title; 
                    $sublink['tags'] = trim(str_replace("|", ",", $sublink_entry->tags), ","); 
                    $sublink['parent'] = $sublink_entry->parent;
                    $sublink['order'] = $sublink_entry->order;
                    $sublink['groups'] = $this->get_link_group_ids_array($sublink_entry->id);
                    $sublink['groups_string'] = $this->get_groups_string($sublink_entry->id);

                    array_push($link['childs'] , $sublink);
                }

                $links[$link_entry->id] = $link;
            }

            /*foreach($results as $link_entry)
            {
                if(!array_key_exists($link_entry->id, $links)){
                    $links[$link_entry->id] = array();
                    $links[$link_entry->id]['groups'] = array();
                    $links[$link_entry->id]['childs'] = array();
                }
                
                $links[$link_entry->id]['id'] = $link_entry->id;
                $links[$link_entry->id]['name'] = $link_entry->name;
                $links[$link_entry->id]['target'] = $link_entry->target;
                $links[$link_entry->id]['title'] = $link_entry->title; 
                $links[$link_entry->id]['tags'] = trim(str_replace("|", ",", $link_entry->tags), ","); 
                $links[$link_entry->id]['parent'] = $link_entry->parent;
                $links[$link_entry->id]['order'] = $link_entry->order;


                if($link_entry->parent != 0){
                    $links[$link_entry->parent]['childs'][$link_entry->id] = $links[$link_entry->id];
                    if(!array_key_exists('groups', $links[$link_entry->parent]))
                        $links[$link_entry->parent]['groups'] = array();
                }
                    

                array_push($links[$link_entry->id]['groups'], intval($link_entry->group_id));
   
            }*/
            
            foreach($links as $key => $link)
            {
                
                $links[$key] = (object)$links[$key];
                
            }
            if($id == 0)
                return $links;
            else
                return $links[$id];   
        }
        function get_link_group_ids_array($link_id)
        {
            $this->db->where("link_id", $link_id);
            $this->db->from('be_link_permissions');
            $query = $this->db->get();
            $result = $query->result();

            $groups = array();

            foreach($result as $entry)
            {
                array_push($groups, intval($entry->group_id));
            }
            return $groups;
        }
        function get_by_tag($tag)
        {
            if($tag != "")
                $this->db->where("tags like '%|$tag|%'");

            return $this->get();
        }
        function get_groups_string($link)
        {   
            $CI =& get_instance();
            $CI->load->model('users');
            
            
                   
            $this->db->where('link_id', $link);
            $query = $this->db->get("link_permissions");
            $result = $query->result();

            
            $groups = array();
            foreach($result as $permission)
            {
                $group_name = $CI->users->get_group_name_by_id($permission->group_id);
                array_push($groups, $group_name);    
            }
            
            $result = implode(",", $groups);
 
            return $result;
        }
        function edit($post)
        {
            $data = array(
                "name"  => $post['name'],
                "target"  => $post['target'],
                "title"  => $post['title'],
                "tags"  => "|".str_replace(",", "|",$post['tags'])."|",
                "parent"  => $post['parent'],
                "order"  => $post['order'],

                );
            $this->db->where('id', $post['id']);    
            $this->db->update('links', $data);
            
            $this->set_link_permissions($post['id'], explode(",", $post['groups']));    
        }
        
        function add($post)
        {            
            $data = array(
                "name"  => $post['name'],
                "target"  => $post['target'],
                "title"  => $post['title'],
                "tags"  => "|".str_replace(",", "|",$post['tags'])."|",
                "parent"  => $post['parent'],
                "order"  => $post['order'],
                );
            
            $this->db->insert('links', $data);
            
            $this->set_link_permissions($this->db->insert_id(), explode(",", $post['groups']));    
        }
        
        function delete($id)
        {
            $this->db->delete('links', array('id' => $id));
            $this->db->delete('link_permissions', array('link_id' => $id));
        }
        function set_link_permissions($link_id, $groups = array())
        {
            $CI =& get_instance();
            $CI->load->model('users');
            
            
            
            $this->db->where('link_id', $link_id);
            $this->db->delete('link_permissions');
            
            foreach($groups as $group)
            {
                $data = array(
                    "link_id"   => $link_id,
                    "group_id"   => $CI->users->get_group_id_by_name($group),
                );
                $this->db->insert('link_permissions', $data);
            }
            
        }
    }
?>
