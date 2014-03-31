<?php
/*
    class Stylers
    {
        protected $db;
        protected $versions;
        protected $id;
        protected $style;
        protected $global;
        protected $version;

        function Styler($id)
        {
            $this->id = $id;
            $ci =& get_instance();
            $ci->load->model('versions');

            $this->db =& $ci->db;
            $this->versions =& $ci->versions;

        }

        function set_global()
        {
            $this->global = true;
        }
        function initialize($style)
        {
            switch(is_int($this->id))
            {
                case true:
                    $data['id'] = $this->id;
                    break;

                case false:
                    $data['name'] = $this->id;
                    break;
            }

            $data['active'] = "true";

            if($this->global)
                $data['global'] = "true";
            else
                $data['global'] = "false";

            $this->db->insert("blocks", $data);

        }

        function load($id)
        {
            global $active_controller;

            $user = $active_controller->user;


            if($user->is_member_of("Administrators") && $this->versions->get_pending_page_version_id($active_controller->get_page_path()))
                $page_version = $this->versions->get_pending_page_version_id($active_controller->get_page_path()); 
            else
                $page_version = $this->versions->get_active_page_version_id($active_controller->get_page_path());
            
             
            if($user->is_member_of("Administrators") && $this->versions->get_pending_page_version_id("layout"))
                $layout_version = $this->versions->get_pending_page_version_id("layout"); 
            else
                $layout_version = $this->versions->get_active_page_version_id("layout");   

            $this->db->where("(`id` = '$id'");
            $this->db->or_where("name = '$id')");

            $this->db->where("(`version` = '$page_version'");
            $this->db->or_where("`version` = '0'");
            $this->db->or_where("`version` = '$layout_version')");

            $this->db->order_by("id DESC");
            $this->db->limit(1);

            $query = $this->db->get("blocks");
            $result = $query->result();

            if($result){
                $this->is_new = false;
                $this->version = $result[0]->version;
                $this->global = $result[0]->global == "true";
                $this->style .= $result[0]->style;
            }else
            {
                $this->is_new = true;
                return;
            }

            if(!$this->is_bond_to_version()){
                if(!$this->global){
                    $this->bind_to_page_version($page_version);
                    $this->version = $page_version;
                }else{
                    $this->bind_to_page_version($layout_version);
                    $this->version = $layout_version;
                }
            }


        }
        function is_bond_to_version()
        {
            return $this->version != 0;
        }
        function bind_to_page_version($version_id)
        {
            $this->db->where(array('id' => $this->id));
            $this->db->or_where(array('name' => $this->id));
            //$this->db->where("active = 'true' ");

            $data = array(
                'version'   =>  $version_id
            );
            $this->db->update('blocks', $data);
        }

    }
  class Blocks extends Styler{
    
    private $content;

    
    
    
    private $is_new;

    private $absolute = false;

    function Block($id, $style="")
    {
        parent::__construct($id);
        
        $this->style = $style;
        $this->global = false;

        
        $this->load($id);
        if(!$this->is_new)
            $this->show();
    }
    function set_position_absolute(){
        $this->absolute = true;
    }
    
    function set_default($content)
    {
        if($this->is_new){
            $this->initialize($content);
            $this->load($this->id);   
            $this->show();
        }
    }
    
    function load($id)
    {
        global $active_controller;

        $user = $active_controller->user;


        if($user->is_member_of("Administrators") && $this->versions->get_pending_page_version_id($active_controller->get_page_path()))
            $page_version = $this->versions->get_pending_page_version_id($active_controller->get_page_path()); 
        else
            $page_version = $this->versions->get_active_page_version_id($active_controller->get_page_path());
        
         
        if($user->is_member_of("Administrators") && $this->versions->get_pending_page_version_id("layout"))
            $layout_version = $this->versions->get_pending_page_version_id("layout"); 
        else
            $layout_version = $this->versions->get_active_page_version_id("layout");   

        $this->db->where("(`id` = '$id'");
        $this->db->or_where("name = '$id')");

        $this->db->where("(`version` = '$page_version'");
        $this->db->or_where("`version` = '0'");
        $this->db->or_where("`version` = '$layout_version')");

        $this->db->order_by("id DESC");
        $this->db->limit(1);

        $query = $this->db->get("blocks");
        $result = $query->result();

        if($result){
            $this->is_new = false;
            $this->content = $result[0]->content;
            $this->version = $result[0]->version;
            $this->global = $result[0]->global == "true";
            $this->style .= $result[0]->style;
        }else
        {
            $this->is_new = true;
            return;
        }

        if(!$this->is_bond_to_version()){
            if(!$this->global){
                $this->bind_to_page_version($page_version);
                $this->version = $page_version;
            }else{
                $this->bind_to_page_version($layout_version);
                $this->version = $layout_version;
            }
        }


    }

    
    function show()
    {
        global $active_controller;
        if($active_controller->user->is_member_of("Administrators")){
            $attr = "contenteditable='false'";
            if($this->absolute)
                "position: absolute;top:0px; left: 0px;".$this->style;
            echo "<div $attr class='block' id='block-".$this->id."' blockid='".$this->id."' style=' ".$this->style."'>";
            echo $this->content;
            echo "</div>";
        }        
        else
            echo $this->content;

    }
  }*/
?>
