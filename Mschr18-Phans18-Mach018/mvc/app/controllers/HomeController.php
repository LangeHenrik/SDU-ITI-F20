<?php

class HomeController extends Controller {

	// Main page / homepage
	public function index ($param) {
		//This is a proof of concept - we do NOT want HTML in the controllers!
		//echo '<br><br>Home Controller Index Method<br>';
		//echo 'Param: ' . $param . '<br><br>';
		$this->view('home/index');
	}

	public function createUser() {
		$viewbag = $this->post();
		if ($viewbag) {
			$this->model('User', $viewbag);
		}
		else {
			// You can only create user with post method
			header('Location: /Mschr18-Phans18-Mach018/mvc/public/home/other');
		}
	}

	// Feed page is added in restrictions
	public function feed () {
		$picture = $this->model('Picture');
		$viewbag['pictures'] = $picture->getAll();
		$this->view('user_content/feed', $viewbag);
	}

	public function other ($param1 = 'first parameter', $param2 = 'second parameter') {
		$user = $this->model('User');
		$user->name = $param1;
		$viewbag['username'] = $user->name;
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
		$this->view('home/index', $viewbag);
	}

	public function registration () {

	}

	public function restricted () {
		echo 'Welcome - you must be logged in';
	}

	public function login($username) {
		if($this->model('User')->login($username)) {
			$_SESSION['logged_in'] = true;
			$this->view('home/login');
		}
	}

	public function logout() {


		//if($this->post()) {
			session_unset();
			header('Location: /Mschr18-Phans18-Mach018/mvc/public/home');
		//} else {
		//	echo 'You can only log out with a post method';
		//}
	}

	public function error401() {
		$this->view('home/401');
	}

	public function loggedout() {
		echo 'You are now logged out';
	}

}
