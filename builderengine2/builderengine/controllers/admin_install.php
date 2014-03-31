<?php
    class admin_install extends BE_Controller
    {
        function admin_install()
        {
            parent::__construct();

           if($this->is_installed())
                redirect("/", 'location');

        }


        function index()
        {
            $this->step_one();
        }

        function create_admin($username, $password, $email)
        {
            $this->load->database();
            $this->load->model("users");

            $admin['name']      = "";
            $admin['username']  = urldecode($username);
            $admin['password']  = urldecode($password);
            $admin['email']     = urldecode($email);
            $admin['groups']    = "Members,Administrators,Frontend Editor,Frontend Manager";

            $this->users->register_user($admin);
            echo "success";
        }
        function install_db($host, $user, $password, $db)
        {
            $host = urldecode($host);
            $user = urldecode($user);
            $password = urldecode($password);
            $db = urldecode($db);


            error_reporting(0);
            mysql_connect($host, $user, $password) or die ("Could not connect to MySQL server. Please go back and check your settings.");
            mysql_select_db($db) or die ("Could not connect to MySQL database. Please go back and check your settings.");


            $command = 'mysql'
                    . ' --host=' . $host
                    . ' --user=' . $user
                    . ' --password=' . $password
                    . ' --database=' . $db
                    . ' --execute="SOURCE ' . APPPATH."install"
            ;
            $output = shell_exec($command . '/database.sql"');

            $config = file_get_contents(APPPATH."config/database_template.php");
            $config = str_replace("##DB_HOST##", $host, $config);
            $config = str_replace("##DB_USER##", $user, $config);
            $config = str_replace("##DB_PASS##", $password, $config);
            $config = str_replace("##DB_NAME##", $db, $config);

            file_put_contents(APPPATH."config/database.php", $config) or die("Could not create database configuration file.");

            echo "success";
        }
        function finish()
        {
            $config = file_get_contents(APPPATH."config/config.php");
            $config = str_replace('$config[\'site_installed\'] = false;', '$config[\'site_installed\'] = true;', $config);

            file_put_contents(APPPATH."config/config.php", $config);
            echo "success";
        }
        function configure($sitename, $host, $user, $password, $db){
            $this->load->database();
            $this->BuilderEngine->load_settings();
            $this->BuilderEngine->set_option("website_name", urldecode($sitename));
            echo "success";
        }
        function step_one()
        {

            $requirements = array();
            if(array_key_exists('HTTP_MOD_REWRITE', $_SERVER))
                $requirements['mod_rewrite'] = true;
            else
                $requirements['mod_rewrite'] = false;

            $requirements['writable'] = check_writable_recurse(".") ;
            $requirements['php_version'] = check_php_version("5.0") ;
            $requirements['mysql_available'] = function_exists("mysql_connect") && function_exists("mysql_select_db") && function_exists("mysql_query") ;
            


            $data['requirements'] = $requirements; 
            $this->show->backend('maintenance/step_one', $data);




        }

    }
?>
