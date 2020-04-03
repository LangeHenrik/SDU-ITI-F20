<?php

class HomeController extends Controller {

	// Main / home / default - page.
	public function index ($param) {
		//This is a proof of concept - we do NOT want HTML in the controllers!
		echo '<br>Home Controller Index Method<br>';
		//echo 'Param: ' . $param . '<br><br>';
		$this->view('home/index');
	}

	// createUser is only available with post method.
	public function createUser () {
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
		echo '<br>Home Controller feed Method<br>';
		$picture = $this->model('Picture');
		$viewbag['pictures'] = $picture->getAll();
		$this->view('home/feed', $viewbag);
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

	// login is only available with post method.
	public function login() {
		$loginCredentials = $this->post();
		if ($loginCredentials) {
			if($this->model('User')->login($loginCredentials)) {
				$_SESSION['logged_in'] = true;
				$this->view('home/feed');
			}
			else {
				// Failed to login
			}
		}
		else {
			// You can only log in with a post method
		}
	}

	public function logout() {
		if($this->post()) {
			session_unset();
			header('Location: /Mschr18-Phans18-Mach018/mvc/public/home');
		} else {
			// You can only log in with a post method.
		}
	}

	public function page401() {
		echo '<br>Home Controller page401 Method<br>';
		$this->view('home/401');
	}

	public function loggedout() {
		echo 'You are now logged out';
	}

}
