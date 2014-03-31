<?php

    class module_manager extends BE_Controller
    {
        function parse($argv, &$handler, &$parameters)
        {

            $handler = "";
            $parameters = array();

            $handler = $argv[0]."/_remap";
            
            
            for($i = 1; $i < count($argv); $i++)
                array_push($parameters, $argv[$i]);
           
            if(count($parameters) == 0)
                array_push($parameters, "index");    
        
        }

        function parse_ajax($argv, &$handler, &$parameters)
        {

            $handler = "";
            $parameters = array();

            $handler = $argv[0]."/ajax/".$argv[1];
            
            
            for($i = 1; $i < count($argv); $i++)
                array_push($parameters, $argv[$i]);
           
            if(count($parameters) == 0)
                array_push($parameters, "index");    
        
        }
        function process_seo()
        {
            $argv = func_get_args();

            $data = explode("-", $argv[0], 2);
            call_user_func_array(array($this, "process"), $data);
        }
        function process($par1)
        {
            global $BuilderEngine;
            $this->show->set_frontend();
            $this->load->model('users');

            $argv = func_get_args();

            $handler = "";
            $parameters = "";

            $this->parse($argv, $handler, $parameters);


            $parameters_string = implode("/", $parameters);
            $page_path = $argv[0]."/".$parameters_string;
            $BuilderEngine->set_page_path($page_path);
            $module_folder = explode("/", $handler);

            $this->load->model("modules_db");
            $module = $this->modules_db->get_by_folder($module_folder[0]);


            if(!$module){
                if(is_dir(APPPATH."../modules/".$module_folder[0])){
                    $this->modules_db->insert($module_folder[0]);
                    $module = $this->modules_db->get_by_folder($module_folder[0]);
                }else{
                    return show_404();
                }
            }
            if(!$this->user->is_member_of_any($module->permissions['frontend']['ids']) && count($module->permissions['frontend']['ids']) != 0){
                show_404();
                return;
            }


            $data['contents'] = Modules::run_with_params($handler, $parameters);

                
            
            if(!$data['contents'])
                return show_404();
            $this->show->frontend('full',$data);
        }

        function process_ajax($par1)
        {

            $this->show->set_frontend();
            $this->load->model('users');

            $argv = func_get_args();

            $handler = "";
            $parameters = "";

            $this->parse_ajax($argv, $handler, $parameters);


            echo Modules::run_with_params($handler, $parameters);

 
        }

        function process_admin($par1)
        {
            $this->load->model('users');

            $argv = func_get_args();
            $handler = "";
            for($i = 0; $i < 3; $i++)
            {
                $handler .= $argv[$i]."/";
                unset($argv[$i]);
            }
            
            $handler = trim($handler ,"/");
            $argv = array_shift($argv);

            $module = explode("/", $handler);

            $this->load->model("modules_db");
            $module = $this->modules_db->get_by_folder($module[0]);

            if(!$this->user->is_member_of_any($module->permissions['frontend']['ids']) || count($this->user->is_member_of_any($module->permissions['frontend']['ids'])) == 0){
                show_404();
                return;
            }
            if(!is_array($argv))
                $argv = array($argv);


            $data['contents'] = Modules::run_with_params($handler, $argv);
            $breadcrumb = explode("/", $handler);
            $breadcrumb[0][0] = strtoupper($breadcrumb[0][0]);
            if(!isset($this->show->breadcrumb[0])){
                $this->show->breadcrumb[0]['name'] = $breadcrumb[0];
                $this->show->breadcrumb[0]['url'] = "";
            }
            $name = explode("_", $breadcrumb[2]);
            foreach($name as &$segment)
            {
                $segment[0] = strtoupper($segment[0]);
            }
            $breadcrumb[2] = implode(" ", $name);
            $this->show->breadcrumb[1]['name'] = $breadcrumb[2];
            $this->show->breadcrumb[1]['url'] = "#";

            $this->show->backend('blank',$data);
        }
    }
?>
