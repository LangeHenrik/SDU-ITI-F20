<?php

class Router {

	protected $controller = 'HomeController';
	protected $method = 'index';
	protected $params = [];

	function __construct () {

		$url = $this->parseUrl();

		if(isset($url[0])) {
			$url[0] = ucfirst($url[0]);
		}

		if(file_exists(APP.'controllers/' . $url[0] . 'Controller.php')) {
			$this->controller = $url[0] . 'Controller';
			unset($url[0]);
		}
		else{
			//404
			$this->controller = 'ErrorController';
			$url[1] = '_404';
		}

		require_once APP.'controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		if(!empty($url[1])) {
			if(method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
			else{
				$this->controller = 'ErrorController';
				require_once APP.'controllers/' . $this->controller . '.php';
				$this->controller = new $this->controller;
				$this->method = '_404';
			}
		}
		$this->params = $url ? array_values($url) : [];
		require_once APP.'core/Restricted.php';
		if(restricted(get_class($this->controller), $this->method)) {
			header('Location:'.URL);
		} else {
			call_user_func_array([$this->controller, $this->method], $this->params);
		}

	}

	// public function parseUrl () {
	// 	$url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
	// 	if(substr($url, -1) !== "/") {
	// 		$url = $url . "/";
	// 	}
	// 	$url = explode('/', $url);
	// 	//$url = array_slice($url, 2);
	// 	if(empty($url[0])) {
	// 		$url[0] = 'home';
	// 	}
	// 	return $url;
	// }
// 	public function parseUrl () {
// if(isset($_GET['url'])){
// $url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
// if(substr($url, -1) !== "/") {
// $url = $url . "/";
// }
// $url = explode('/', $url);
// }
// if(empty($url[0])) {
// $url[0] = 'home';
// }
// return $url;
// }

public function parseUrl () {

	$url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
	if(substr($url, -1) !== "/") {
		$url = $url . "/";
	}
	$url = explode('/', $url);
	return array_slice($url, 4);
}

}
