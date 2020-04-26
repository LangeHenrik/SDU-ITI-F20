<?php

function restricted ($controller, $method) {

	$restricted_urls = array(	'HomeController' => array('restricted'),
                                'ImageController' => array('index','upload','loadImages'),
                                'UserController' => array('index','logout'),
                                'ApiController' => array()
								    );

	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
		return false;
	} else if( isset($controller) && in_array(strtolower($method), $restricted_urls[$controller])) {
		return true;
	} else {
		return false;
	}
}