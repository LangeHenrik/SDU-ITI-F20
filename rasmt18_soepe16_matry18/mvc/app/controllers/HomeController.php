<?php

class HomeController extends Controller {
	
	public function index () {
		//This is a proof of concept - we do NOT want HTML in the controllers!
//		echo '<br><br>Home Controller Index Method<br>';
//		echo 'Param: ' . $param . '<br><br>';
        $this->view('home/index');
	}
	
	public function restricted () {
		echo 'Welcome - you must be logged in';
	}
	
	public function login() {
        if (isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            if($this->model('User')->login($username, $password)) {
                $_SESSION['logged_in'] = true;
                header('Location: /rasmt18_soepe16_matry18/mvc/public/Image/index');
			} else {
				$viewbag['danger'] = "Username and password not accepted";
				$this->view('home/index', $viewbag);
			}
		}
	}
	
	public function logout() {
		session_unset();
		header('Location: /rasmt18_soepe16_matry18/mvc/public/Home/');
	}

	public function register() {
	    if($this->post()){
			$viewbag =  $this->model('User')->register($_POST['username'], $_POST['password'], $_POST['password2']);
			$this->view('home/register', $viewbag);
        } else {
            $this->view('home/register');
        }
    }
}