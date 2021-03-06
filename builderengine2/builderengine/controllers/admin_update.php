<?php
    error_reporting(0);
    class admin_update extends BE_Controller
    {
    
        function admin_install()
        {
            
            parent::__construct();
           
            if($this->is_installed())
                redirect("/", 'location');
             
        }
        function get_updates_num()
        {
            $current_version = $this->BuilderEngine->get_option('version');
            $updates = file_get_contents("http://update-server.builderengine.com/check_updates_num.php?version=".$current_version);
        
            echo $updates;
        }
        function download()
        {
            @mkdir(APPPATH."update");
            $update_file = file_get_contents("http://update-server.builderengine.com/download.php?version=".$this->BuilderEngine->get_option('version'));
            $file_path = APPPATH."update/update.zip";
            file_put_contents($file_path, $update_file);
            if(file_get_contents($file_path) == $update_file)
                echo "success";
            else
                echo "Unable to download update.";
            
        }
        function update_files(){
            $zip = new ZipArchive;
            $file_path = APPPATH."update/update.zip";
            if ($zip->open($file_path) === TRUE) {
                $zip->extractTo('.');
                $zip->close();
                

                
                unlink(APPPATH."update/update.zip");
                echo 'success';
            } else {
                echo 'failed';
            }
        }
        
        function update_db()
        {
            if(!file_exists(APPPATH."update/sql/update.sql")){
                echo "success";
                return;
            }
                
            $sql = file_get_contents(APPPATH."update/sql/update.sql");

            $query = explode (";", $sql);
                
            foreach($query as $statement){
                if($statement)
                    $this->db->query($statement);
            }
            unlink(APPPATH."update/sql/update.sql");
            echo "success";
        }
        function finish()
        {
            $current_version = $this->BuilderEngine->get_option('version');
            $remote_version = file_get_contents("http://update-server.builderengine.com/check.php?version=".$current_version);
            $this->BuilderEngine->set_option('version',$remote_version);

            $current_version = $this->BuilderEngine->get_option('version');
            $remote_version = file_get_contents("http://update-server.builderengine.com/check.php?version=".$current_version);

            $this->load->model("users");
            $this->users->delete_alerts_with_tag("be-update");

            if($remote_version != $current_version)
                echo "repeat";
            else
                echo "success";
        }
        function index()
        {
            $current_version = $this->BuilderEngine->get_option('version');
            $remote_version = file_get_contents("http://update-server.builderengine.com/check.php?version=".$current_version);

            if($current_version == $remote_version)
                redirect('/admin', 'location');
            $requirements = array();
            $requirements['writable'] = check_writable_recurse(".") ;
            $requirements['php_version'] = check_php_version("5.0") ;
            $requirements['mysql_available'] = function_exists("mysql_connect") && function_exists("mysql_select_db") && function_exists("mysql_query") ;
            $requirements['mod_rewrite'] = getenv(HTTP_MOD_REWRITE) == "On" ;
            


            $data['requirements'] = $requirements;    
            $this->show->backend('maintenance/update', $data);   

        }    
    }
?>
