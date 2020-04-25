<?php

class UserlistController extends Controller {
	
	public function __construct () {
		header('Content-Type: application/json');
		//check api-key?
		//check username and password?
		//or die();
	}

	public function index ($param) {
        $path = "../app/views/home/upload.php";
        include $path;
	}
	/*
	public function users () {
		$users = $this->model('User')->getAll();
		echo json_encode($users, JSON_PRETTY_PRINT);
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

    public function login($username) {
        if($this->model('User')->login($username)) {
            $_SESSION['logged_in'] = true;
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

    public function loggedout() {
        echo 'You are now logged out';
    }

*/
}