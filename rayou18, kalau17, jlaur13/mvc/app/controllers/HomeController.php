<?php

class HomeController extends Controller {


	public function index ($parameter = false) {
	    $Restricted = $parameter;
        $user = $this->model('User');
        $viewbag = null;
        if(isset($_SESSION['username'])&& isset($_SESSION['logged_in'])&& $_SESSION['logged_in'] == true){
            $viewbag['username'] =  $_SESSION['username'];
        }
        if($Restricted == true){
            $viewbag['restricted'] = $parameter;
        }
        $this->view('home/index',$viewbag);

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
                //$this->view('home/index');
                header("Location: /rayou18, kalau17, jlaur13/mvc/public/Home/index");
                exit();
		    }
            else{
                $viewbag['wrongLogin'] = 'wrong Username or Password';
                $this->view('partials/login_form',$viewbag);
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
            header("Location: /rayou18, kalau17, jlaur13/mvc/public/Home/index");

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
        header('Location: /rayou18,%20kalau17,%20jlaur13/mvc/public/home');
	}

}
