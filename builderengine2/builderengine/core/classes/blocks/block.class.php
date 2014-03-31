<?php
  class Block{
    protected $db;
    protected $versions;
    protected $content;
    protected $id;
    protected $db_id;

    protected $style;
    protected $static_style;
    protected $version;
    protected $global;
    protected $is_new;
    protected $absolute = false;
    protected $BuilderEngine;
    protected $forced_global = false;
    protected $classes;
    protected $forced_classes;
    protected $area = 0;
    protected $type;
    protected $is_ok_with_expand = false;
    function Block($id, $classes = "", $style="")
    {
        $this->type = "block";
        global $active_show;
        $this->BuilderEngine = &$active_show->controller->BuilderEngine;
        $this->global = false;
        
        $this->classes = $classes;

        if(!$this->forced_global){
            $this->global = $this->BuilderEngine->get_blocks_global();
        }
        $this->id = $id;
        $this->style = $style;
        

        $ci =& get_instance();
        $ci->load->model('versions');

        $this->db =& $ci->db;
        $this->versions =& $ci->versions;
        $this->load($id);

    }
    public function is_ok_with_expand()
    {
        $this->is_ok_with_expand = true;
    }
    public function set_area($area)
    {
        $this->area = $area;
    }
    function get_db_id(){ return $this->db_id; }
    function is_new(){ return $this->is_new;}
    function set_position_absolute(){
        $this->absolute = true;
    }
    function set_global($bool = true)
    {
        $this->forced_global = true;
        $this->global = $bool;
    }
    function set_default($content)
    {
        if($this->is_new)
            $this->content = $content;
        
    }
    function initialize()
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

        $data['area'] = $this->area;
        $data['classes'] = $this->classes;
        $data['content'] = $this->content;
        $data['type'] = $this->type;
        $data['style'] = $this->style;
        $data['static_style'] = $this->static_style;
        $data['active'] = "true";

        if($this->global)
            $data['global'] = "true";
        else
            $data['global'] = "false";

        $this->db->insert("blocks", $data);
        $this->db_id    = $this->db->insert_id();

        $version = 0;

        if($this->global){
            $version = $this->versions->get_current_layout_version(); 
        }else{
            $version = $this->versions->get_current_page_version();
        }
            

        $this->versions->bind_block_to_page_version($this->id, $version);

    }
    function load($id)
    {
        $result = $this->versions->load_block($id);

        if(!$result){
            $this->is_new = true;
            return;

        }

        $this->is_new = false;
        $this->db_id    = $result->id;
        $this->content = $result->content;
        $this->version = $result->version;
        $this->global = $result->global == "true";
        $this->style = $result->style;
        $this->static_style = $result->static_style;
        $this->version = $result->version;
        $this->classes = $result->classes;
    }

    function show()
    {
        if($this->is_new){
            $this->initialize();  
        }
        $expand = " expand='false' ";
        if($this->is_ok_with_expand)
            $expand = " expand='true' ";

        global $active_controller;
        if($active_controller->user->is_member_of("Administrators")){
            $attr = "contenteditable='false'";
        }else
            $attr = "";
        echo "<div $expand $attr class='block resizable movable ".$this->classes."' id='block-".$this->id."' blockid='".$this->db_id."' style='".$this->style.$this->static_style."'>";
        echo $this->content;
        echo "</div>";
    }
  }

  class Styler extends Block
  {
    private $style_classes;
    private $css = array();
    function Styler($id, $classes, $auto_show = true)
    {
        $this->style_classes = $classes; // Do not play smart by moving this line after the parent constructor. You have been warned!
        parent::__construct($id,"");
        
        $this->global = false;
        if($this->is_new){
            $this->initialize("");
            if($auto_show)
             $this->show();
        }
    }
    function css($key, $value = null)
    {
        if($value == null)
        {
            if(is_array($key))
                $this->css = $key;
            else
                return $this->css[$key] ;
        }else{
            $this->css[$key] = $value;   
        }
        
    }
    function compile_css()
    {
        $string = "";

        foreach ($this->css as $key => $value)
        {
            $string .= $key.": ".$value."; ";

        }
        return $string;
    }
    function show($return_output = false)
    {

        $expand = " expand='false' ";
        if($this->is_ok_with_expand)
            $expand = " expand='true' ";
        if($return_output)
            return " $expand class='{$this->style_classes} resizable movable' changeablebg=\"true\" id='block-".$this->id."' blockid='".$this->id."' style=' ".$this->compile_css().$this->style."' ";
        else
            echo " class='{$this->style_classes} resizable movable' changeablebg=\"true\" id='block-".$this->id."' blockid='".$this->id."' style=' ".$this->compile_css()." ".$this->style."' ";
    }
  }

  class IconSelector extends Block
  {
    private $icon_style;
    private $forced_class = "";
    function IconSelector($id, $icon_class, $style = "")
    {
        $this->icon_style = $style;
        $this->static_style = $style;
        $this->classes = $icon_class;
         // Do not play smart by moving this line after the parent constructor. You have been warned!
        parent::__construct($id,$icon_class, $style);
        $this->type = "icon";
        
        
    }
    function force_class($class)
    {
        $this->forced_class .= $class." ";
    }
    function show()
    {
        if($this->is_new){
            $this->initialize("");

        }
        echo "<i class='{$this->classes} movable {$this->forced_class}' id='block-".$this->id."' blockid='".$this->db_id."' changeableicon=\"true\" style='".$this->style." ".$this->icon_style."'></i>";
    }
  }

  class Background_Selector extends Block
  {
    private $bg_style;
    private $forced_class = "";
    function Background_Selector($id, $bg_class, $style = "")
    {
        $this->bg_style = $style;
        $this->static_style = $style;
        $this->classes = $bg_class;
         // Do not play smart by moving this line after the parent constructor. You have been warned!
        parent::__construct($id,$bg_class, $style);
        $this->type = "background_selector";
        
        
    }
    function force_class($class)
    {
        $this->forced_class .= $class." ";
    }
    function show()
    {
        if($this->is_new){
            $this->initialize("");

        }
        echo " class='{$this->classes} {$this->forced_class}' id='bg-selection-".$this->id."' blockid='".$this->db_id."' changeablebg=\"true\" style='".$this->style." ".$this->bg_style."'";
    }
  }
?>