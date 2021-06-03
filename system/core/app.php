<?php
if (!defined('BASEPATH')) die('Access Denied!');

class App {

	private static $instance;
    public $theme_data = array();

	function __construct() {
		self::$instance = $this;

	}

	public function model($model)
    {
        $model = strtolower($model);

		if (isset(self::$instance->$model))
        {
            error(500, 'Error - model name "' . $model . '" is already defined');
        }
        else
        {
			preg_match('/\/(\w+)/', $_SERVER['REQUEST_URI'], $matches);
			if(empty($matches[1])) $matches[1] = 'welcome';
            $filename = BASEPATH . 'modules/' . $matches[1] . '/models/' . $model . '.php';
            if (file_exists($filename))
            {
                require_once BASEPATH . '/system/core/model.php';
                require_once $filename;
                $class_name = ucfirst($model);
                if(class_exists($class_name)) {
                    self::$instance->$model = new $class_name();
                } else {
                    error(500, 'Error - class for model "' . $model . '" could not be found');
                }
                
            }
            else
            {
                error(500, 'Error - Model file "' . $model . '" could not be found');
            }
        }
    }

	private function set($name, $value){
		$this->theme_data[$name] = $value;
	}

	private function load($theme = '', $view = '' , $view_data = array(), $return = FALSE)
	{  
		$this->set('content', view($view, $view_data, TRUE));	
		return view($theme, $this->theme_data, $return);
	}
		
	public function render($view = '', $data = array(), $return = FALSE)
	{
        preg_match('/\/(\w+)/', $_SERVER['REQUEST_URI'], $matches);
        if(empty($matches[1])) $matches[1] = 'welcome';
		return $this->load('themes/default/overview', 'modules/'.$matches[1].'/views/'.$view, $data, $return);
	}

}

class Admin {

	private static $instance;
    public $theme_data = array();

	function __construct() {
		self::$instance = $this;
	}

	public function model($model)
    {
        $model = strtolower($model);

    	if (isset(self::$instance->$model))
        {
            error(500, 'Error - model name "' . $model . '" is already defined');
        }
        else
        {
			preg_match('/\/admin\/(\w+)/', $_SERVER['REQUEST_URI'], $matches);
            if(empty($matches[2])) $matches[2] = 'welcome';
			$filename = BASEPATH . 'modules/' . $matches[2] . '/models/' . $model . '.php';
            if (file_exists($filename))
            {
                require_once BASEPATH . '/system/core/model.php';
                require_once $filename;
                $class_name = ucfirst($model);
                if(class_exists($class_name)) {
                    self::$instance->$model = new $class_name();
                } else {
                    error(500, 'Error - class for model "' . $model . '" could not be found');
                }
                
            }
            else
            {
                error(500, 'Error - Model file "' . $model . '" could not be found');
            }
        }
    }
    
	private function set($name, $value){
		$this->theme_data[$name] = $value;
	}

	private function load($theme = '', $view = '' , $view_data = array(), $return = FALSE)
	{  
		$this->set('content', view($view, $view_data, TRUE));	
		return view($theme, $this->theme_data, $return);
	}
		
	public function render($view = '', $data = array(), $return = FALSE)
	{
        preg_match('/\/admin\/(\w+)/', $_SERVER['REQUEST_URI'], $matches);
        if(empty($matches[2])) $matches[2] = 'welcome';
		return $this->load('themes/admin/overview', 'modules/'.$matches[2].'/views/'.$view, $data, $return);
	}

}

