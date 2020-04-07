<?php

class HomeController extends Controller {
	
	public function index () {
		//This is a proof of concept - we do NOT want HTML in the controllers!
//		echo '<br><br>Home Controller Index Method<br>';
//		echo 'Param: ' . $param . '<br><br>';
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
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username_input = filter_var($_POST["username"],FILTER_SANITIZE_STRING);
        $password_input = filter_var($_POST["password"],FILTER_SANITIZE_STRING);

            if($this->model('User')->login($username_input,$password_input)) {
			    $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username_input;
                $this->view('home/index');
		    }
            else{
                $this->view('partials/login_form');
            }
        }

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $this->view('partials/login_form');
        }
	}


    public function signup() {
	    if($_SERVER['REQUEST_METHOD'] == 'POST'){
	        $username_input_sanitized = filter_var($_POST["username"],FILTER_SANITIZE_STRING);
            $password_input = filter_var($_POST["password"],FILTER_SANITIZE_STRING);
            $repeatPassword = filter_var($_POST["repeat_password"],FILTER_SANITIZE_STRING);
            $password_hash = password_hash($password_input, PASSWORD_BCRYPT);

	        $this->model('User')->signup($username_input_sanitized,$password_hash);
	        $this->view('partials/signup_form');

        }
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $this->view('partials/signup_form');
        }

    }


	
	public function logout() {
		
		
		//if($this->post()) {
			session_unset();
			header('Location: /rayou18,%20kalau17,%20jlaur13/mvc/public/home/loggedout');
		//} else {
		//	echo 'You can only log out with a post method';
		//}
	}
	
	public function loggedout() {
		echo 'You are now logged out';
	}
	
}