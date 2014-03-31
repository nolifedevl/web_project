<?php
    class posts extends CI_Model
    {
        function search($search = "")
        {
            if($search != ""){
                //$query = $this->db->query("SELECT t1.*,t2.content, MATCH (t1.`title`) AGAINST ('*$search*' IN BOOLEAN MODE) as score_title, MATCH (`content`) AGAINST ('$search') as score_content FROM (`be_posts`)  t1 LEFT JOIN `be_blocks` t2 on t1.`block` = t2.`id` WHERE MATCH (`title`) AGAINST ('*$search*' IN BOOLEAN MODE) OR MATCH (`content`) AGAINST ('$search') ORDER BY ((score_title*2)+score_content) DESC");
                
            }else{
                $this->db->select('posts.*, blocks.content AS content');
                // Tells us how to make the relationship between the posts and users table
                $this->db->join('blocks', 'posts.block = blocks.id');
                
                $this->db->where("blocks.`active` = 'true'"); 
                
                $this->db->order_by("date_created DESC");
                $query = $this->db->get("posts");
            }

            return $query->result();
            }
        function get($id)
        {
            $this->db->where("id", mysql_real_escape_string($id));
            $query = $this->db->get("posts");
            $result = $query->result();
            if(!$result)
                return false;
            else
                return $result[0];
        }
        function upload_image()
        {
            if(!is_dir("files"))
                mkdir("files");
 
            if(!is_dir("files/images"))
                mkdir("files/images");

            $file = "image";
            $this->load->library('upload');
            $config['file_name'] = md5(time()).".jpg";
            $config['upload_path'] = 'files/images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '11100';
            $config['max_width']  = '22048';
            $config['max_height']  = '22048';
            $config['overwrite']  = true;
 
            // Initialize config for File
            $this->upload->initialize($config);
 
            // Upload file
            if ($this->upload->do_upload($file))
            {
                $result = $this->upload->data();
                return $config['file_name'];
            }
            return "";
        }
        function map_post_to_block($post, $block)
        {
            $update = array ("block" => $block);
            $this->db->where("id", $post);
            $this->db->update("posts", $update);
        }
        function add($post, $author)
        {
            $image = $this->upload_image();

            $data = array( 
                "title" => $post['title'],
                "date_created" => time(),
                "author" => $author,
                "image" => $image
            );

            $this->db->insert("posts", $data);
            return $this->db->insert_id();

        }

        function edit($id, $contents)
        {
            $image = $this->upload_image();

            $data = array( 
                "title" => $contents['title'],
                "image"    => $image,
            );
            $this->db->where('id', $id);
            $this->db->update('posts', $data);        
        }
        function delete($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('posts');
        }
    }
?>
