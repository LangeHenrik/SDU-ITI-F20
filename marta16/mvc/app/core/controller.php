<?php

class Controller
{
	
	// -- MAIN METHODS --------------------------------------------
	
	public function model($model)
	{
		require_once "../app/models/" . $model . ".php";
		$class_name = ucfirst($model) . "Model";
		return new $class_name();
	}

	public function view($view, $data = [])
	{
		require_once "../app/views/" . $view . ".php";
	}

	// -- HELPER METHODS ------------------------------------------

	static function is_post()
	{
		return $_SERVER["REQUEST_METHOD"] === "POST";
	}
	
	static function is_get()
	{
		return $_SERVER["REQUEST_METHOD"] === "GET";
	}

	static function is_logged_in()
	{
		return isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true;
	}

	static function session_username()
	{
		return isset($_SESSION["username"]) ? $_SESSION["username"] : null;
	}

	static function url_path()
	{
		return filter_var($_SERVER["REQUEST_URI"], FILTER_SANITIZE_URL);
	}

	static function url_path_has($path)
	{
		return (strpos(self::url_path(), $path) !== false);
	}

	static function redirect($path)
	{
		header("Location: " . DIR_PUBLIC . $path);
	}
}