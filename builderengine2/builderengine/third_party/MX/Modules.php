<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

(defined('EXT')) OR define('EXT', '.php');

global $CFG;

/* get module locations from config settings or use the default module location and offset */
is_array(Modules::$locations = $CFG->item('modules_locations')) OR Modules::$locations = array(
	APPPATH.'modules/' => '../modules/',
);

/* PHP5 spl_autoload */
spl_autoload_register('Modules::autoload');

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library provides functions to load and instantiate controllers
 * and module controllers allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Modules.php
 *
 * @copyright	Copyright (c) 2011 Wiredesignz
 * @version 	5.4
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/

class Modules
{
	public static $routes, $registry, $locations;

	/**
	* Run a module controller method
	* Output from module is buffered and returned.
	**/
	public static function run($module) {

		$method = 'index';

		if(($pos = strrpos($module, '/')) != FALSE) {
			$method = substr($module, $pos + 1);
			$module = substr($module, 0, $pos);
		}

		if(strpos($module,'/') !== false)
			$child_module = str_replace("/", "_child/", $module)."_child";
		else
			$child_module = $module."_child";

		if($class = self::load($child_module)) {
			if (method_exists($class, $method))	{
				ob_start();
				$args = func_get_args();
				$output = call_user_func_array(array($class, $method), array_slice($args, 1));
				$buffer = ob_get_clean();
				return ($output !== NULL) ? $output : $buffer;
			}
		}else
		if($class = self::load($module)) {

			if (method_exists($class, $method))	{
				ob_start();
				$args = func_get_args();
				$output = call_user_func_array(array($class, $method), array_slice($args, 1));
				$buffer = ob_get_clean();
				return ($output !== NULL) ? $output : $buffer;
			}
		}

		return false;
		log_message('error', "Module controller failed to run: {$module}/{$method}");
	}

	//the run function could become private
	public static function run_with_params($handler, $parameters = array()) {
		switch(count($parameters)) {
            case 0:
                return Modules::run($handler);
            case 1:
                return Modules::run($handler,$parameters[0]);
            case 2:
                return Modules::run($handler,$parameters[0],$parameters[1]);
            case 3:
                return Modules::run($handler,$parameters[0],$parameters[1],$parameters[2]);
            case 4:
                return Modules::run($handler,$parameters[0],$parameters[1],$parameters[2],$parameters[3]);
            case 5:
                return Modules::run($handler,$parameters[0],$parameters[1],$parameters[2],$parameters[3],$parameters[4]);
            case 6:
                return Modules::run($handler,$parameters[0],$parameters[1],$parameters[2],$parameters[3],$parameters[4],$parameters[5]);
            case 7:
                return Modules::run($handler,$parameters[0],$parameters[1],$parameters[2],$parameters[3],$parameters[4],$parameters[5],$parameters[6]);
            case 8:
                return Modules::run($handler,$parameters[0],$parameters[1],$parameters[2],$parameters[3],$parameters[4],$parameters[5],$parameters[6],$parameters[7]);
        }
	}

	/** Load a module controller **/
	public static function load($module) {

		(is_array($module)) ? list($module, $params) = each($module) : $params = NULL;

		/* get the requested controller class name */
		$alias = strtolower(basename($module));

		/* create or return an existing controller from the registry */
		if ( ! isset(self::$registry[$alias])) {

			/* find the controller */
			list($class) = CI::$APP->router->locate(explode('/', $module));

			/* controller cannot be located */
			if (empty($class)) return;

			/* set the module directory */
			$path = APPPATH.'controllers/'.CI::$APP->router->fetch_directory();

			/* load the controller class */
			$class = $class.CI::$APP->config->item('controller_suffix');

			


			if(strpos($class,'_child') !== false){
				$models_path = str_replace("_child", "",$path)."../models/";
				
				foreach(scandir($models_path) as $model_entry)
				{
					if($model_entry == "." || $model_entry == "..")
						continue;

					$model_name = str_replace(".php", "", $model_entry);
					self::load_file($model_name, $models_path);
				}
				self::load_file(str_replace("_child", "",$class), str_replace("_child", "",$path));
			}

			$models_path = $path."../models/";
			foreach(scandir($models_path) as $model_entry)
			{
				if($model_entry == "." || $model_entry == "..")
					continue;

				$model_name = str_replace(".php", "", $model_entry);
				self::load_file($model_name, $models_path);
			}

			self::load_file($class, $path);

			/* create and register the new controller */
			$controller = ucfirst($class);
			$new_controller = new $controller($params);


			if(strpos($class,'_child') !== false){
				$models_path = str_replace("_child", "",$path)."../models/";
				
				foreach(scandir($models_path) as $model_entry)
				{
					if($model_entry == "." || $model_entry == "..")
						continue;

					$model_name = str_replace(".php", "", $model_entry);
					$new_controller->load->model($model_name);
				}
			}

			$models_path = $path."../models/";
			foreach(scandir($models_path) as $model_entry)
			{
				if($model_entry == "." || $model_entry == "..")
					continue;

				$model_name = str_replace(".php", "", $model_entry);
				$new_controller->load->model($model_name);
			}

			self::$registry[$alias] = $new_controller;
		}

		return self::$registry[$alias];
	}

	/** Library base class autoload **/
	public static function autoload($class) {

		/* don't autoload CI_ prefixed classes or those using the config subclass_prefix */
		if (strstr($class, 'CI_') OR strstr($class, config_item('subclass_prefix'))) return;

		/* autoload Modular Extensions MX core classes */
		if (strstr($class, 'MX_') AND is_file($location = dirname(__FILE__).'/'.substr($class, 3).EXT)) {
			include_once $location;
			return;
		}

		/* autoload core classes */
		if(is_file($location = APPPATH.'core/'.$class.EXT)) {
			include_once $location;
			return;
		}

		/* autoload library classes */
		if(is_file($location = APPPATH.'libraries/'.$class.EXT)) {
			include_once $location;
			return;
		}
	}

	/** Load a module file **/
	public static function load_file($file, $path, $type = 'other', $result = TRUE)	{

		$file = str_replace(EXT, '', $file);
		$location = $path.$file.EXT;

		if ($type === 'other') {
			if (class_exists($file, FALSE))	{
				log_message('debug', "File already loaded: {$location}");
				return $result;
			}
			include_once $location;
		} else {

			/* load config or language array */
			include $location;

			if ( ! isset($$type) OR ! is_array($$type))
				show_error("{$location} does not contain a valid {$type} array");

			$result = $$type;
		}
		log_message('debug', "File loaded: {$location}");
		return $result;
	}

	/**
	* Find a file
	* Scans for files located within modules directories.
	* Also scans application directories for models, plugins and views.
	* Generates fatal error if file not found.
	**/
	public static function find($file, $module, $base) {

		$segments = explode('/', $file);

		$file = array_pop($segments);
		$file_ext = (pathinfo($file, PATHINFO_EXTENSION)) ? $file : $file.EXT;

		$path = ltrim(implode('/', $segments).'/', '/');
		$module ? $modules[$module] = $path : $modules = array();

		if ( ! empty($segments)) {
			$modules[array_shift($segments)] = ltrim(implode('/', $segments).'/','/');
		}

		foreach (Modules::$locations as $location => $offset) {
			foreach($modules as $module => $subpath) {
				$fullpath = $location.$module.'/'.$base.$subpath;

				if ($base == 'libraries/' AND is_file($fullpath.ucfirst($file_ext)))
					return array($fullpath, ucfirst($file));

				if (is_file($fullpath.$file_ext)) return array($fullpath, $file);
			}
		}

		return array(FALSE, $file);
	}

	/** Parse module routes **/
	public static function parse_routes($module, $uri) {

		/* load the route file */
		if ( ! isset(self::$routes[$module])) {
			if (list($path) = self::find('routes', $module, 'config/') AND $path)
				self::$routes[$module] = self::load_file('routes', $path, 'route');
		}

		if ( ! isset(self::$routes[$module])) return;

		/* parse module routes */
		foreach (self::$routes[$module] as $key => $val) {

			$key = str_replace(array(':any', ':num'), array('.+', '[0-9]+'), $key);

			if (preg_match('#^'.$key.'$#', $uri)) {
				if (strpos($val, '$') !== FALSE AND strpos($key, '(') !== FALSE) {
					$val = preg_replace('#^'.$key.'$#', $val, $uri);
				}

				return explode('/', $module.'/'.$val);
			}
		}
	}
}