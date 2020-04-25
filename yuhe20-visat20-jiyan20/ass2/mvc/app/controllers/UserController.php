<?php

class UserController extends Controller {
    public function index () {
        $viewbag['users'] = $this->model('User')->getList();
        return($this->view('home/index', $viewbag));
    }

    public function login () {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($this->model('User')->login($username, $password)) {
                $_SESSION['logged_in'] = true;
                header('');//the address of the image index
            } else {
                $viewbag['danger'] = "Username and password incorrect";
                $this->view('home/login', $viewbag);
            }
        } else {
            $this->view('home/login');
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
        if($this->post()){
            $viewbag = $this->model('User')->register($_POST['username'], $_POST['email-register'], $_POST['pwd-register'], $_POST['pwd_repeat']);
            $this->view('home/register', $viewbag);
        } else {
            $this->view('home/register');
        }
    }

	public function loggedout() {
		echo 'You are now logged out';
	}
}