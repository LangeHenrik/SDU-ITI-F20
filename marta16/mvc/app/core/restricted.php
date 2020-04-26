<?php

function is_restricted($controller, $method)
{
	$controller = get_class($controller);

	$restricted_methods = array(
		// "SomeController" => array("method1", "method2", "...)
		"HomeController" => array(""),
		"UsersController" => array("list", "logout"),
		"FeedController" => array("list", "upload"),
		"ApiController" => array()
	);
	
	if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true)
		return false;

	else
	if (isset($controller) && array_key_exists($controller, $restricted_methods) && in_array($method, $restricted_methods[$controller]))
		return true;
	
	else
		return false;
}