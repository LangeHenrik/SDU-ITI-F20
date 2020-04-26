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
                header('Location: /yuhe20-visat20-jiyan20/mvc/public/Image/index');//the address of the image index
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
			header('Location: /yuhe20-visat20-jiyan20/mvc/public/Home');
		//} else {
		//	echo 'You can only log out with a post method';
		//}
	}
    
    public function register() {
<<<<<<< HEAD:yuhe20-visat20-jiyan20/mvc/app/controllers/UserController.php
        if($this->post()){
            $viewbag = $this->model('User')->register($_POST['username'], $_POST['email-register'], $_POST['pwd-register'], $_POST['pwd_repeat']);
            $this->view('home/register', $viewbag);
        } else {
            $this->view('home/register');
=======
        $viewbag['title'] = 'Register';

        if(isset($_POST['signup-submit'])){
        
            $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            #$user = "user";
            $userXSS = htmlspecialchars($user, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');

            $email = filter_var($_POST['email-register'], FILTER_SANITIZE_STRING);
            #$email = "asds@asds.com";
            $emailXSS = htmlspecialchars($email, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');

            $pass = filter_var(password_hash($_POST['pwd-register'], PASSWORD_DEFAULT), FILTER_SANITIZE_STRING);
            #$pass = "senha123";
            $passXSS = htmlspecialchars($pass, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');

            $pass2 = filter_var(password_hash($_POST['pwd-repeat'], PASSWORD_DEFAULT), FILTER_SANITIZE_STRING);
            #$pass = "senha123";
            $passXSS2 = htmlspecialchars($pass, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');
            
            if (!empty($user) and !empty($email) and !empty($pass) and !empty($pass2)){
                if ($_POST['pwd-register'] == $_POST['pwd-repeat']){
                    if ($this->model('User')->register(array($userXSS, $emailXSS,  $passXSS))){
                        $viewbag['sucess'] = "Account created ! <a href='".URL."home/login'>Log In</a>";
                    }
                }else{
                    $viewbag['error'] = "Password does not match";
                }
            }
>>>>>>> b350235effb055adcd6fd4d311f80c9067065a29:yuhe20-visat20-jiyan20/ass2-ver2/mvc/app/controllers/UserController.php
        }
        $this->view('home/register', $viewbag);
    }

	public function loggedout() {
		echo 'You are now logged out';
	}
}