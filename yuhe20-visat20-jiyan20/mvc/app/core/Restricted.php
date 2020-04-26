<?php

function restricted($controller, $method)
{

	$restricted_urls = array(
		'HomeController' => array('restricted', 'logout'),
		'ApiController' => array(),
		'RegisterController' => array(),
		'ImageFeedController' => array('index'),
		'UploadController' => array('index', 'uploadPicture'),
		'UserListController' => array('index', 'getSpecificUsers')
	);

	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
		return false;
	} else if (isset($controller) && in_array($method, $restricted_urls[$controller])) {
		return true;
	} else {
		return false;
	}
}