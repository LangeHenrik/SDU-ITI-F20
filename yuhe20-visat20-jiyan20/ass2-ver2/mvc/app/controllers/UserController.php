<?php

class UserController extends Controller{
    public function index () {
        $viewbag['users'] = $this->model('User')->list();
        return($this->view('user/index', $viewbag));
    }

    public function login () {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($this->model('User')->login($username, $password)) {
                $_SESSION['login'] = true;
                header('');//the address of the image index
            } else {
                $viewbag['danger'] = "User and password incorrect";
                $this->view('user/login', $viewbag);
            }
        } else {
            $this->view('user/login');
        }
    }

    public function logout() {
		
		
		//if($this->post()) {
			session_unset();
			header('Location: /Exercises/mvc/public/home/loggedout');
		//} else {
		//	echo 'You can only log out with a post method';
		//}
	}
    
    public function register() {
        if(isset($_POST['signup-submit'])){
            $viewbag = $this->model('User')->register($_POST['username'], $_POST['email-register'], $_POST['pwd-register'], $_POST['pwd-repeat']);
            $this->view('user/register', $viewbag);
        } else {
            $this->view('user/register');
        }
    }

	public function loggedout() {
		echo 'You are now logged out';
	}
}