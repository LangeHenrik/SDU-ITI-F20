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
        }
        $this->view('home/register', $viewbag);
    }

	public function loggedout() {
		echo 'You are now logged out';
	}
}