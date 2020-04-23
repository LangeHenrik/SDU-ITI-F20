<?php

class HomeController extends Controller {

    public $logged_in = false;
    public $viewbag;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn']){
            $this->logged_in = true;
            $this->viewbag['user_name'] = $_SESSION['username'];
            $this->viewbag['user_avatar'] = $this->model('User')->getAvatar($_SESSION['username']);
        }
        $this->viewbag['logged_in'] = $this->logged_in;
    }

    public function index () {
		if ($this->logged_in){
            $this->viewbag['posts'] = $this->model('Post')->allPosts();
		    $this->view('home/Feed', $this->viewbag);
        } else {
		    $this->view('home/Login', $this->viewbag);
        }
	}
	
	public function restricted () {
		echo 'Welcome - you must be logged in';
	}
	
	public function login() {
	    if ($this->post()){
	        if (isset($_POST["username"]) && isset($_POST["password"])){
                $user = htmlentities($_POST["username"]);
                $pass = htmlentities($_POST["password"]);
                print ($this->model('User')->login($user, $pass));
                if ($this->model('User')->login($user, $pass)){
                    print 'loggedin';
                    $_SESSION['LoggedIn'] = true;
                    $_SESSION['username'] = $user;
                    header('Location: /akvis18/mvc/public/home/Feed');
                }
            }
        } elseif ($this->get()){
	        $this->viewbag['cancer'] = true;
			$this->view('home/login', $this->viewbag);
        }
	}
	
	public function logout(){
        if ($this->post()) {
            session_unset();
            header('Location: /akvis18/mvc/public/home/index');
        }
    }
	
	public function loggedout() {
		echo 'You are now logged out';
	}

	public function register(){

        if ($this->get()){
            $this->view('home/Register', $this->viewbag);
        }
        if ($this->post()) {
            include_once '../app/services/GetFormData.php';
            $username_regex = '/^[A-Za-zÆØÅæøå _\-\d]{3,}$/';
            $email_regex = '/^\S+@\S+\.[a-z|A-Z]{2,10}$/';
            $pass_regex = '/^(?=.*[a-zæøå])(?=.*[A-ZÆØÅ])(?=.*\d)(?=.*[@$!%*?&])[A-Za-zÆØÅæøå\d@$!%*?&]{8,}$/';
            $errors = array();
            $username = $avatar = $email = $password = "";

            $username = getAndMatchPost('username', $username_regex);
            $email = getAndMatchPost('email', $email_regex);
            $password = getAndMatchPost('password', $pass_regex);
            $sec_password = getAndMatchPost('second-password', $pass_regex);
            $avatar = getImage('avatar');

            if (!$password === $sec_password) {
                $errors[] = 'Passwords don\'t match';
            }

            if (empty($errors) && $this->model('User')->userAvailable($username, $email)) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $this->model('User')->newUser($username, $email, $password, $avatar);
                $_SESSION['LoggedIn'] = true;
                $_SESSION['username'] = $username;
                header('Location: /akvis18/mvc/public/home/feed');
            } else {
                $this->viewbag['errors'] = $errors;
                var_dump($this->viewbag['errors']);
                $this->view('home/Register');
            }
        }
    }

    public function upload(){
        if ($this->get()){
            $this->view('home/Upload', $this->viewbag);
        } elseif ($this->post()){
            include_once '../app/services/GetFormData.php';
            $errors = array();
            $title = getAndMatchPost('title','/^.{1,50}$/');
            $description = getAndMatchPost('description', '/^.{1,255}$/');
            $image = getImage('image');

            if (empty($errors)){
                $id = $this->model('User')->getUserID($_SESSION['username']);
                $this->model('Post')->newPost($id, $title, $description, $image);
                header('Location: /akvis18/mvc/public/home/feed');
            } else {
                print_r($errors);
                $this->viewbag['errors'] = $errors;
            }

        }
    }

    public function users(){
        $this->viewbag['users'] = $this->model('User')->getAll();
        $this->view('home/Users', $this->viewbag);
    }
    public function feed(){
        $this->viewbag['posts'] = $this->model('Post')->allPosts();
        $this->view('home/Feed', $this->viewbag);
    }
}