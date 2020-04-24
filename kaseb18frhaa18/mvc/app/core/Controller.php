<?php
class Controller {
	
	public function model($model) {
		require_once '../app/models/' . $model . '.php';
		return new $model();
	}
	
	public function view($view, $viewbag = []) {
		require_once '../app/views/' . $view . '.php';
	}
	public function post () {
		return $_SERVER['REQUEST_METHOD'] === 'POST';
	}
	
	public function get () {
		return $_SERVER['REQUEST_METHOD'] === 'GET';
	}
	
	public function nameOfUser(){
		error_reporting(0);
		if ($_SESSION['logged_in']){
			echo '<h3 id="name"> Welcome ' . $_SESSION["name"] . '</h3>';
		} else
		echo '<h3 id="name">Please Log in</h3>';
	}
	
}