<?php

function restricted ($controller, $method) {

	$restricted_urls = array(   'HomeController' => array('restricted', 'logout', 'upload_page', 'index'),
                                    'ApiController' => array('users','images'),
                                    'UserController' => array('restricted', 'index'),
                                    'ImageController' => array('restricted', 'upload','uploadImage', 'upload_page')
							);

	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
		return false;
	} else if( isset($controller) && in_array($method, $restricted_urls[$controller])) {
		return true;
	} else {
		return false;
	}
}