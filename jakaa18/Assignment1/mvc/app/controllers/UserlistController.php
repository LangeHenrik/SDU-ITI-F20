<?php

class UserlistController extends Controller {

    public $logged_in;
    public $viewbag;

	public function __construct () {
		//check api-key?
		//check username and password?
		//or die();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
            $this->logged_in=true;
            $this->viewbag['username']=$_SESSION['username'];
        }
        $this->viewbag['logged_in'] = $this->logged_in;
	}

	public function index ($param) {
        if ($this->logged_in) {
            $this->viewbag['posts'] = $this->model('Post')->getPictures();
            $this->view('userlist/index', $this->viewbag);
        } else {
            $this->view('home/login', $this->viewbag);
        }
	}

	public function users () {
		$users = $this->model('User')->getAll();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

/*
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