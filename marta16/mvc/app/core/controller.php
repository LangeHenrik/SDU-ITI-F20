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

	static function is_POST()
	{
		return $_SERVER["REQUEST_METHOD"] === "POST";
	}
	
	static function is_GET()
	{
		return $_SERVER["REQUEST_METHOD"] === "GET";
	}

	static function is_SESSION_LOGGED_IN()
	{
		return isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true;
	}

	static function SESSION_USERNAME()
	{
		return isset($_SESSION["username"]) ? $_SESSION["username"] : null;
	}

	static function REDIRECT($path)
	{
		header("Location: " . DIR_PUBLIC . $path);
	}

	static function REDIRECT_HOME()
	{
		self::REDIRECT("/public/home");
	}
}