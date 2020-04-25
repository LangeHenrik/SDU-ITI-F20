<?php

function restricted($controller, $method)
{

	$restricted_urls = array(	//TODO verify all methods
		'HomeController' => array('logout'),
		'ApiController' => array(),
		'RegistrationController' => array(),
		'ImagefeedController' => array('index'),
		'UploadController' => array('index'),
		'UserlistController' => array('index')
	);

	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
		return false;
	} else if (isset($controller) && in_array($method, $restricted_urls[$controller])) {
		return true;
	} else {
		return false;
	}
}
