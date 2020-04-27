<?php

function restricted ($controller, $method) {

	$restricted_urls = array(	'HomeController' => array('restricted', 'logout', 'feed', 'upload', 'users', 'imgUpload'),
								'ApiController' => array()
							);

	if(isset($_SESSION['userID'])) {
		return false;
	} else if( isset($controller) && in_array($method, $restricted_urls[$controller])) {
		return true;
	} else {
		return false;
	}
}