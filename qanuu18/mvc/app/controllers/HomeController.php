<?php

class HomeController extends Controller {
	
	public function index ($param) {

		if($param == 'homePage'){


			$this->view('home/home');

		}
		
	}
	
	public function other ($param1 = 'first parameter', $param2 = 'second parameter') {
		$user = $this->model('User');
		$user->name = $param1;
		$viewbag['username'] = $user->name;
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
		$this->view('home/index', $viewbag);
	}
	
	public function restricted () {
		echo 'Welcome - you must be logged in';
	}
	
	public function login($username) {


		if($this->post()){


		if($this->model('User')->login($username)) {


			$_SESSION['logged_in'] = true;
			$this->view('home/menu');

		}
		}
	}
	
	public function logout() {
		
		
		if($this->post()) {
			session_unset();
			header('Location: /qanuu18/mvc/public/home/loggedout');
		} else {
			echo 'You can only log out with a post method';
		
	}
}
	
	public function loggedout() {
		echo 'You are now logged out';

		$this->view('home/home');

	}

	public function homePage(){


		$this->view('home/home');
	}





	public function registration(){

		$this->view('home/registration');
	}

	}
	
