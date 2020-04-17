<?php

class UserController extends Controller {
	
	public function index ($param) {
		//This is a proof of concept - we do NOT want HTML in the controllers!
		echo '<br><br>User Controller Index Method<br>';
		echo 'Param: ' . $param . '<br><br>';
	}
	
	public function restricted () {
		echo 'Welcome - you must be logged in';
	}
	
	public function register() {
		if ($this->post()) {
			if ($this->model('User')->registerUser()) {
				$this->view('home/index');
			}
			else { // TODO error handle failed registerUser() in User model
				$this->view('home/index');
			}
		}
		else { // non POST request
			$this->view('user/register');
		}
	}

	public function users() {
		$viewbag = $this->model('User')->getAll();
		$this->view('user/users', $viewbag);
	}

	// Call login on user model and give user a new view based on success or failure
	public function login() {
		if ($this->post()) {
			if($this->model('User')->login()) {
				$this->view('home/frontpage');
			}
			else {
				// fail login
                header('Location: fail');
			}
		}
		else {
            $this->view('user/login');
		}
	}
	
	public function logout() {
		//if($this->post()) {
			session_unset();
			header('Location: /madja16/mvc/public/user/loggedout');
		//} else {
		//	echo 'You can only log out with a post method';
		//}
	}
	
	public function loggedout() {
		echo 'You are now logged out';
	}
	
}