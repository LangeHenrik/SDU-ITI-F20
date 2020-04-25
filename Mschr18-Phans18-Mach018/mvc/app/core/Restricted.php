<?php

function restricted ($controller, $method) {

	$restricted_urls = array(
								'HomeController' => array(),
								'ChatController' => array('getChat', 'postChat', 'updateChat'),
								'UserController' => array('logout', 'users'),
								'PictureController' => array('feed', 'uploadPicture' , 'deletePicture'),
								'ApiController'  => array('restricted')
							);

	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
		return false;
	} else if( isset($controller) && in_array(strtolower($method), $restricted_urls[$controller])) {
		return true;
	} else {
		return false;
	}
}
