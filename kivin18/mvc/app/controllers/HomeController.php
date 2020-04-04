<?php

class HomeController extends Controller {
	
	public function index ($param) {

        $this->view('home/index');
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
	    if(empty($_POST['username']) || empty($_POST['password'])) {
            header('Location: /kivin18/mvc/public/home/');
            return;
        }
	    $username = htmlentities($_POST['username']);
	    $password = htmlentities($_POST['password']);
		if($this->model('User')->login($username, $password)) {
			$_SESSION['logged_in'] = true;
            $_SESSION['user'] = $username;
			$this->view('home/login');
		} else {
		    $viewbag['login_info'] = 'Wrong username or password';
            $this->view('home/index', $viewbag);
        }
	}

    public function register($username) {
        $this->view('home/register');
    }

    public function logout() {
		
		
		//if($this->post()) {
			session_unset();
			header('Location: /kivin18/mvc/public/home/loggedout');
		//} else {
		//	echo 'You can only log out with a post method';
		//}
	}
	
	public function loggedout() {
		echo 'You are now logged out';
	}
	
}