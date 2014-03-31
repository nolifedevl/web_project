<?php
    global $active_show;

    class Show{

        public $controller;
        public $frontend = false;
        public $isolated;
        public $breadcrumb;

        function Show($controller)
        {
            global $active_show;

            //Take care of initializing the active_show with the FIRST show object, otherwise multiple show objects are created
            //This causes the frontend flag and shows to mess up if more than one controller inherits BE_Controller
            if(!is_null($active_show)) return;

            $this->controller = $controller;
            $this->isolated = false;

            $active_show = $this;
            $this->breadcrumb = array();
        }
        function set_default_breadcrumb($index, $name, $url)
        {
            $this->breadcrumb[$index]['name'] = $name;
            $this->breadcrumb[$index]['url'] = $url;

        }
        function set_frontend()
        {
            global $active_show;
            $active_show->frontend = true;
        }
        function theme_file_exists($file)
        {
            return file_exists("../..".get_theme_path().$file);   
        }

        function theme($file, $data = array())
        {
            global $active_show;
            $data['user']   = $active_show->controller->get_user();
            $data['BuilderEngine'] = $active_show->controller->get_builderengine();
            $active_show->controller->load->view("../..".get_theme_path().$file,$data);   
        }

        // parse constants ( site name, slogan, motto or whatever constant strings )
        function frontend($string, $data=array()) {
            global $active_show;

            $data['user']   = $active_show->controller->get_user();
            $data['BuilderEngine'] = $active_show->controller->get_builderengine();
            if(!array_key_exists('contents', $data))
                $data['contents'] = $active_show->controller->load->view($string,$data,true);

            if($active_show->isolated) {
                $active_show->controller->load->vars($data);
                $view = $data['contents'];
                
            } else {
                $view = $active_show->controller->load->view("../..".get_theme_path()."full.php",$data, true);
            }
            $active_show->controller->module_parser->parse($view);
        }

        function component($string) {
            global $active_show;
            $active_show->controller->load->view("../..".get_theme_path().$string.".php");
        }

        function backend($string, $data=array()){
            global $active_show;
            $data['BuilderEngine'] = $active_show->controller->get_builderengine();
            if(isset($active_show->breadcrumb[0]))
                $data['breadcrumb'] = $active_show->breadcrumb;
            else{
                $uri = $active_show->controller->uri->segment(2);
                
                
                $name = explode("_", $uri);

                foreach($name as &$segment)
                {
                    $segment[0] = strtoupper($segment[0]);
                }
                $name = implode(" ", $name);
                $data['breadcrumb'][0]['name'] = $name;
                $data['breadcrumb'][0]['url'] = "";

                $uri = $active_show->controller->uri->segment(3);
                $name = explode("_", $uri);
                foreach($name as &$segment)
                {
                    $segment[0] = strtoupper($segment[0]);
                }
                $name = implode(" ", $name);
                
                $data['breadcrumb'][1]['name'] = $name;
                $data['breadcrumb'][1]['url'] = "";
            }

            $data['user']   = $active_show->controller->get_user();
            $active_show->controller->load->view("../..".get_theme_path().$string.".php",$data);
        }

        //disables the full wrapper class
        function disable_full_wrapper() {
            global $active_show;
            $active_show->isolated = true;
        }


    }

    function is_installed()
    {
        global $active_show;
        return $active_show->controller->is_installed();
    }

    function get_header(){
        global $active_show;
        $active_show->controller->show->component("header");
    }

    function get_sidebar(){
        global $active_show;
        $active_show->controller->show->component("sidebar");
    }

    function get_footer(){
        global $active_show;
        $active_show->controller->show->component("footer");
    }

    function get_page_versions()
    {
        global $active_show;
        return $active_show->controller->get_page_versions();
    }

    function get_page_path(){
        global $active_show;
        return $active_show->controller->get_page_path();
    }
    function set_current_page_version_to_pending()
    {
        global $active_show;
        $controller =  &$active_show->controller;

        $page_version = $controller->versions->get_current_page_version();
        $controller->versions->set_version_pending($page_version);
    }
    function get_theme_path(){
        global $active_show;

        if($active_show->frontend)
            return "/themes/".$active_show->controller->BuilderEngine->get_frontend_theme()."/";
        else
            return "/themes/".$active_show->controller->BuilderEngine->get_backend_theme()."/";
    }

    function build_link($type, $relative_href)
    {
        switch($type)
        {
            case "site":
                return "/index.php/".$relative_href;
            case "module":
                return "/index.php/module/".$relative_href;
            case "module_admin":
                return "/index.php/admin/module/".$relative_href;
            case "admin":
                return "/index.php/admin/".$relative_href;

        }

    }

    function href($type, $relative_href)
    {
        return "href=\"".build_link($type, $relative_href)."\"";
        //return "href=\"#\" onclick=\"$('#content').load('".build_link($type, $relative_href)." .wrapper, script', function () { $(document).trigger('onload'); }); \"";
        //return "href=\"#\" onclick=\"ajax_load('#content', '".build_link($type, $relative_href)."?ajax=true');\"";
    }

    function get_links($tag = "")
    {
        global $active_show;
        $links = $active_show->controller->get_links($tag);
        foreach($links as $key => $link)
        {
            if($link->parent != 0)
                unset($links[$key]);
        }

        foreach($links as $key => $link)
        {
            if($link->childs)
                foreach($link->childs as &$sublink)
                    $sublink = (object)$sublink;
        }
        return $links;
    }
?>
