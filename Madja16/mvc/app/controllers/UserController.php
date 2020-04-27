<?php

class UserController extends Controller {
	
	public function index ($param) {
		//This is a proof of concept - we do NOT want HTML in the controllers!
		// echo '<br><br>User Controller Index Method<br>';
		// echo 'Param: ' . $param . '<br><br>';
	}
	
	public function restricted () {
		echo 'Welcome - you must be logged in';
	}
	
	public function register() {
		if ($this->post()) {
			if ($this->model('User')->registerUser()) {
				header('Location: ../home/');
				$this->view('home/frontpage');
			}
			else {
				header('Location: register');
				$this->view('user/register');
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

	public function login() {
		if ($this->post()) {
			if($this->model('User')->login()) {
				header('Location: ../home/');
				$this->view('home/frontpage');
			}
			else {
				// fail login
                $this->view('user/login');
			}
		}
		else {
            $this->view('user/login');
		}
	}
	
	public function logout() {
		session_unset();
		header('Location: /madja16/mvc/public/home/');
	}
	
}