<?php
class Controller {
	
	public function model($model) {
		require_once '../app/models/' . $model . '.php';
		return new $model();
	}
	
	public function view($view, $viewbag = []) {
		require_once '../app/views/' . $view . '.php';
	}
	
	public function post ($param = NULL) {
		if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
			if ($param == NULL) 
				return $_POST;
			else
				return $_POST[$param];
		} else { 
			return NULL;
		}
	}
	
	public function get () {
		if ( $_SERVER['REQUEST_METHOD'] === 'GET' )
			return $_GET[$param];
		else 
			return NULL;
	}
	
}