<?php

class HomeController extends Controller {

	// Main / home / default - page.
	public function index ($param) {
		//This is a proof of concept - we do NOT want HTML in the controllers!
		//echo '<br>Home Controller Index Method<br>';
		//echo 'Param: ' . $param . '<br><br>';
		$this->view('Home/index');
	}

	// createUser is only available with post method.
	public function createUser() {
		if ($this->post()) {
			$this->model('User');
		}
		else {
			// You can only create user with post method
			$this->view('Home/index');
		}
	}

	// Feed page is added in restrictions
	public function feed () {
		$picture = $this->model('Picture');
		$viewbag['pictures'] = $picture->getAll();
		$this->view('Home/feed', $viewbag);
	}

	public function other ($param1 = 'first parameter', $param2 = 'second parameter') {
		$user = $this->model('User');
		$user->name = $param1;
		$viewbag['username'] = $user->name;
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
		$this->view('Home/index', $viewbag);
	}

	public function signup() {
		if ($this->post()) {
			
		}
	}

	// login is only available with post method.
	public function login() {
		if ($this->post()) {
			if($this->model('User')->login()) {
				$_SESSION['logged_in'] = true;
				$this->view('Home/feed');
			}
			else {
				$viewbag['loginFailed'] = true;
				$this->view('Home/index', $viewbag);
			}
		}
		else {
			$this->view('Home/index');
		}
	}

	public function logout() {
		if($this->post()) {
			session_unset();
			$this->view('Home/index');
		} else {
			// You can only log in with a post method.
		}
	}

	public function page401() {
		$this->view('Home/401');
	}

	public function loggedout() {
		echo 'You are now logged out';
	}

}
