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
            header('location: /akvis18/mvc/public/home/Feed');
        } else {
            header('location: /akvis18/mvc/public/home/Login');
        }
	}

	
	public function login() {
	    if ($this->post()){
	        if (isset($_POST["username"]) && isset($_POST["password"])){
                $user = htmlentities($_POST["username"]);
                $pass = htmlentities($_POST["password"]);
                if ($this->model('User')->login($user, $pass)){
                    $_SESSION['LoggedIn'] = true;
                    $_SESSION['username'] = $user;
                    header('Location: /akvis18/mvc/public/home/Feed');
                } else {
                    $this->viewbag['error'] = 'There is no user with the supplied username/password';
                    $this->view('home/login', $this->viewbag);
                }
            }
        } elseif ($this->get()){
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
            $username_regex = '/^[A-Za-zÆØÅæøå _\-\d]{3,}$/';
            $email_regex = '/^\S+@\S+\.[a-z|A-Z]{2,10}$/';
            $pass_regex = '/^(?=.*[a-zæøå])(?=.*[A-ZÆØÅ])(?=.*\d)(?=.*[@$!%*?&])[A-Za-zÆØÅæøå\d@$!%*?&]{8,}$/';
            $this->viewbag['errors'] = array();
            $username = $avatar = $email = $password = "";

            $username = $this->getAndMatchPost('username', $username_regex);
            $email = $this->getAndMatchPost('email', $email_regex);
            $password = $this->getAndMatchPost('password', $pass_regex);
            $sec_password = $this->getAndMatchPost('second-password', $pass_regex);
            $avatar = $this->getImage('avatar');

            if (!$password === $sec_password) {
                $this->viewbag['errors'][] = 'Passwords don\'t match';
            }

            if (empty($this->viewbag['errors']) && $this->model('User')->userAvailable($username, $email)
                && $username && $email && $password && $sec_password ) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $this->model('User')->newUser($username, $email, $password, $avatar);
                $_SESSION['LoggedIn'] = true;
                $_SESSION['username'] = $username;
                header('Location: /akvis18/mvc/public/home/feed');
            } else {
                $this->viewbag['errors'][] = 'A user exist with the username and/or email';
                $this->view('home/Register', $this->viewbag);
            }
        }
    }

    public function upload(){
        if ($this->get()){
            $this->view('home/Upload', $this->viewbag);
        } elseif ($this->post()){
            $this->viewbag['errors'] = array();
            $title = $this->getAndMatchPost('title','/^.{1,50}$/');
            $description = $this->getAndMatchPost('description', '/^.{1,255}$/');
            $image = $this->getImage('image');

            if (empty($this->viewbag['errors']) && $title && $description && $image){
                $id = $this->model('User')->getUserID($_SESSION['username']);
                $this->model('Post')->newPost($id, $title, $description, $image);
                header('Location: /akvis18/mvc/public/home/feed');
            } else {
                $this->view('home/Upload', $this->viewbag);
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

    private function getImage($name){
        if(isset($_FILES[$name]) && $_FILES[$name]['size'] > 0){
            $ext = array('jpg','jpeg','png','gif');
            $file_name = $_FILES[$name]['name'];
            $file_ext = pathinfo($file_name)['extension'];
            $file_size = $_FILES[$name]['size'];
            $file_tmp = $_FILES[$name]['tmp_name'];

            if (!in_array($file_ext,$ext)){
                $this->viewbag['errors'][] ='File must be jpg, jpeg, png or gif';
                return false;
            }

            if ($file_size > 2097152){
                $this->viewbag['errors'][] = 'Max file size is 2mb';
                return false;
            }

            return file_get_contents($file_tmp);
        }
        return false;
    }
    function getAndMatchPost($name, $regex){
        if (isset($_POST[$name])){
            $value = htmlentities($_POST[$name]);
            if (preg_match($regex, $value)){
                return $value;
            } else {
                $this->viewbag['errors'][] = 'Please enter a valid ' . $name;
                return false;
            }
        }
        $this->viewbag['errors'][] = 'Please enter a ' . $name;
        return false;
    }
}