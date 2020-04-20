<?php

class HomeController extends Controller {
	
	public function index () {
        $this->view('user/login');
	}
	
	public function restricted () {
		echo 'Welcome - you must be logged in';
	}
	

}