<?php

class ErrorController extends Controller {
	
	public function _404 ($param = null) {
		$viewbag['title'] = '404';
		$this->view('errors/404', $viewbag);
	}
	
}