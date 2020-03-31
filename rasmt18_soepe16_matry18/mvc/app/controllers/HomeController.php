<?php

class HomeController extends Controller {
	
	public function index () {
		//This is a proof of concept - we do NOT want HTML in the controllers!
//		echo '<br><br>Home Controller Index Method<br>';
//		echo 'Param: ' . $param . '<br><br>';
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
        //TODO tjek post før check af variabler
		if($this->post() && $this->model('User')->login($_POST['username'], $_POST['password'])) {
			$_SESSION['logged_in'] = true;
			header('Location: /rasmt18_soepe16_matry18/mvc/public/Image/index');
		} else {
		    $this->view('home/login');
        }
	}
	
	public function logout() {
		//if($this->post()) {
			session_unset();
			header('Location: /rasmt18_soepe16_matry18/mvc/public/Home/');
		//} else {
		//	echo 'You can only log out with a post method';
		//}
	}
	
	public function loggedout() {
		echo 'You are now logged out';
	}

	public function register() {
	    if($this->post()){
            $this->model('User')->register($_POST['username'], $_POST['password'], $_POST['password2']);
        } else {
            $this->view('home/register');
        }

    }
	
}