<?php

class UserController extends Controller{
    public function index () {
        $viewbag['users'] = $this->model('User')->getAll();
        return($this->view('user/index', $viewbag));
    }

    public function login () {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($this->model('User')->login($username, $password)) {
                $_SESSION['login'] = true;
                header('')//the address of the image index
            } else {
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
	
	public function loggedout() {
		echo 'You are now logged out';
	}
}