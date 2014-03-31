<?php
include_once("core_functions.php");

includeRecurse(APPPATH."/core/classes");

require_once(APPPATH."third_party/MX/Controller.php");
global $active_controller;

    class BE_Controller extends MX_Controller{
        public $show;
        public $user;
        public $links_array;
        private $page_path;
        function BE_Controller()
        {
            $this->page_path = false;
            global $active_controller;
            global $active_show;
            $active_controller = $this;
            parent::__construct();

            if(!$this->is_installed() && $this->uri->segment(2) != "install"){
                redirect('/admin/install/index', 'location');
            }

            if($this->is_installed())
                $this->load->database();

            $this->load->helper("url");

            if(!$active_show)
                $this->show = new Show($this);
            else
                $this->show = &$active_show;
            $this->load->model('BuilderEngine');
            $this->load->model('users');
            $this->load->model('versions');

            if($this->is_installed()){
                $this->load->model("cache");
                $this->BuilderEngine->load_settings();

                $session = $this->session;
                $user_model = $this->users;
                $this->user = new User($session, $user_model);

                $CI =& get_instance();
                $CI->load->model('links');

                $this->links_array = $CI->links->get();

            }
            $this->BuilderEngine->set_option("active_backend_theme","dashboard", false);
            $this->load->library('module_parser');
            $this->load->library('parser');

            //$this->BuilderEngine->activate_theme("default");

            //echo $this->get_page_path();
        }
        public function get_builderengine()
        {
            return $this->BuilderEngine;
        }
        public function get_page_versions($page_path = null)
        {
            return $this->versions->get_page_versions(($page_path != null) ? $page_path : $this->get_page_path());
        }

        public function get_page_path()
        {
            global $BuilderEngine;
            return $BuilderEngine->get_page_path();

            //Old code below
            if(!$this->page_path)
                die("No Path");
            $path = "";
            $i = 1;
            if($this->uri->rsegments[1] == "module_manager")
            {
                $path = "module/";
                $i += 2;
            }

            for($i; $i <= count($this->uri->rsegments); $i++)
            {
                $path .= $this->uri->rsegments[$i]."/";
            }
            $path = trim($path, "/");
            return $path;
        }
        public function is_installed()
        {
            return file_exists("builderengine/config/database.php") && $this->config->item("site_installed");
        }
        public function get_user()
        {
            return $this->user;
        }
        public function get_links($tag = "")
        {
            if($tag != "")
                return $this->links->get_by_tag($tag);
            
            return $this->links_array;
        }
        public function show($view)
        {
            //commented function
            // if(file_exists("themes/".$this->BuilderEngine->get_active_theme()."/".$view.".php"))
            //     $this->load->view("../../themes/".$this->BuilderEngine->get_active_theme()."/".$view);
            // else
            //     die ("File "."themes/".$this->BuilderEngine->get_active_theme()."/".$view.".php");
        }
        
    }

    class Module extends BE_Controller{
    
        public function _remap($method, $params = array())
        {
            if(!is_array($params))
            {
                $val = $params;
                $params = array($val);
            }
            $this->BuilderEngine->register_visit($this->get_page_path());
            if(method_exists($this, $method)){

                return call_user_func_array(array($this, $method), $params);    
            }
                

            $string[0] = $method;
            for($i = 0; $i < count($params); $i++)
            {
                array_push($string, $params[$i]);
            }
            if ((strrpos($method, '.html') === strlen($method) - 5) && method_exists($this, "seo"))
                return call_user_func_array(array($this, "seo"), $string);

            if(method_exists($this, "query"))
                return call_user_func_array(array($this, "query"), $string);
                

            show_404();
        }
    }


?>
