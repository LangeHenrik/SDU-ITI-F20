<?php

function restricted ($controller, $method) {
	$restricted_urls = array(
							'HomeController' => array('restricted', 'logout'),
							'FeedController' => array('restricted', 'index', 'upload'),
							'ContactController' => array('restricted', 'index'),
							'ApiController' => array('restricted', 'users'),
							'ErrorController' => array()
							);
	if(isset($_SESSION['id']) && $_SESSION['id'] == true) {
		return false;
	} else if( isset($controller) && in_array($method, $restricted_urls[$controller])) {
		return true;
	} else {
		return false;
	}
}
