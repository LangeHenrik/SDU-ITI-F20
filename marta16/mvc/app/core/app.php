<?php

class App
{
	// constants
	// const BASE_URL        = "/marta16/mvc";
	
	// default controller, method and parameters
	protected $controller = "home";
	protected $method     = "index";
	protected $params     = [];

	public function __construct()
	{
		// get array of parsed URL
		$url = self::parse_url();

		// perform any routing here from the parsed URL!

		// -- CONTROLLER ----------------------------------------------

		// set controller from URL if exists
		if (isset($url[0]) && file_exists("../app/controllers/" . $url[0] . ".php"))
		{
			$this->controller = $url[0];
			unset($url[0]);
		}

		// instantiate controller (from string)
		require_once "../app/controllers/" . $this->controller . ".php";
		$class_name = ucfirst($this->controller) . "Controller";
		$this->controller = new $class_name();
		// $this->controller = new ${!${''} = ucfirst($this->controller) . "Controller"}();

		// -- METHOD --------------------------------------------------
		
		// check if method has been passed and exists within the controller
		if (isset($url[1]) && method_exists($this->controller, $url[1]))
		{
			$this->method = $url[1];
			unset($url[1]);
		}

		// -- PARAMETERS-----------------------------------------------

		// fetch parameters from parsed url and rebase them (if any exist)
		$this->params = $url ? array_values($url) : [];

		// -- INVOKE --------------------------------------------------

		// check if restricted
		require_once "restricted.php";
		if (is_restricted($this->controller, $this->method))
		{
			header('HTTP/1.0 403 Forbidden');
			die();
		}

		// invoke controller method with specified parameters
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	static function parse_url()
	{
		// get url, add slashes if needed and remove base
		// e.g. ("/my/base/public/foo/bar/" -> "/foo/bar" -> "foo/bar")
		$url = filter_var($_SERVER["REQUEST_URI"], FILTER_SANITIZE_URL);
		$url = str_replace(BASE_URL . "/public", "", $url);
		$url = str_replace("-", "_", $url);
		$url = trim($url, "/");

		// split url into array; remove empty elements
		$url = explode("/", $url);
		$url = array_filter($url);

		// return array
		// print_r($url);
		return $url;
	}
}