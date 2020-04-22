<?php

class UserController extends Controller {
	
	public function index ($param) {
		//This is a proof of concept - we do NOT want HTML in the controllers!
		echo '<br><br>Home Controller Index Method<br>';
		echo 'Param: ' . $param . '<br><br>';
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

	public function login() {
		if( $this->post() && $this->model('User')->login() ) {
			$this->view('user/login');
		} else {
			$this->view('user/loginpage');
		}
	}
	
	public function loginpage() {
		$this->view('user/loginpage');
	}

	public function is_valid_password(string $password) {
		return (preg_match('/(?=.*[A-Z])(?=.*[a-z])(?=.*\d)\w{8,}/',$password) );
	}
	
	public function is_valid_username(string $username) {
		return (preg_match('/^[A-Za-z]\w*/',$username));
	}

	public function registration() {
		$this->view('user/registration');
	}

	public function register() {
		$viewbag['0'] = '0';
		if ( isset($_POST['username']) && isset($_POST['password']) ) {
			$valid_username = $this->is_valid_username($_POST['username']);
			$valid_password = $this->is_valid_password($_POST['password']);

			$viewbag['valid_username'] = $valid_username;
			$viewbag['valid_password'] = $valid_password;

			if ($valid_password && $valid_username) {
				if ($this->model('User')->register() ) {
					$this->view('user/registered');
					return;
				} else {
					$viewbag['username_taken'] = True;
				}
			} 
		}
		$this->view('user/registration',$viewbag);
		return;
	}
	
	public function logout() {
		session_unset();
		header('Location: /asmoe16/mvc/public/home/index');
	}
	
}
