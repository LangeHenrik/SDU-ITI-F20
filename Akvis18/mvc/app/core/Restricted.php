<?php

function restricted ($controller, $method) {

	$restricted_urls = array(	'HomeController' => array('restricted', 'upload', 'users', 'feed'),
								'ApiController' => array()
							);

	if(isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == true) {
		return false;
	} else if( isset($controller) && in_array(strtolower($method), $restricted_urls[$controller])) {
		return true;
	} else {
		return false;
	}
}