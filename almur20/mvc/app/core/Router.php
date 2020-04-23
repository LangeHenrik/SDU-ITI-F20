<?php

class Router {
	
	protected $controller = 'FrontController';
	protected $method = 'index';
	protected $params = [];
	
	function __construct () {
		$url = $this->parseUrl();
		
		if(isset($url[0])) {
			$url[0] = ucfirst($url[0]);
		}

		if(file_exists('../app/controllers/' . $url[0] . 'Controller.php')) {
			$this->controller = $url[0] . 'Controller';
			unset($url[0]); //Makes "inivisble" the [0] parameter of the array
		}
		
		require_once '../app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;
		
		if(isset($url[1])) {
			if(method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		
		$this->params = $url ? array_values($url) : [];
		
		//Check if controller and method are restricted
		require_once 'Restricted.php';
		//print_r($_SESSION);
		if(restricted(get_class($this->controller), $this->method)) {
			header('Location: ../front');
			//echo 'Access Denied';
		} else {
			call_user_func_array([$this->controller, $this->method], $this->params);
		}
		
	}
	
	public function parseUrl () {
		$url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
		//Add / if to the final of the URL if it doesn't have one 
		if(substr($url, -1) !== "/") {
			$url = $url . "/";
		}
		$url = explode('/', $url);
		return array_slice($url, 4);
	}
	
}
	

