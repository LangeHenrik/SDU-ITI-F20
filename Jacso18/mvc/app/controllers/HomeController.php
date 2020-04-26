<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/jacso18/mvc/app/services/UtilityFunctions.php';

class HomeController extends Controller
{
	private $utility;

	public function __construct()
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$this->utility = new UtilityFunctions();
	}

	public function index($param)
	{
		header('Location: /jacso18/mvc/public/home/login');

	}

	public function restricted()
	{
		echo 'Welcome - you must be logged in';
	}

	public function login()
	{
		$viewbag['error'] = "";
		if (isset($_SESSION['error'])){
			$viewbag['error'] = $_SESSION['error'];
			 
		} 
		$this->view('home/login',$viewbag);

		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
			$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
			if ($this->model('user')->isUser($username, $password)) {
				$_SESSION['logged_in'] = true;
				$_SESSION['username'] = $username;
				$_SESSION['error'] = '';
				header('Location: /jacso18/mvc/public/post/image_feed');
			} else {
				$_SESSION['error'] = 'Wrong username or password';
				header('Location: /jacso18/mvc/public/home/login');
			}
		}
	}


	public function logout()
	{
		session_unset();
		header('Location: /jacso18/mvc/public/home/index');
	}

	public function create_account()
	{
		$viewbag['user'] = "";
		if (isset($_SESSION['user'])){
			$viewbag['user'] = $_SESSION['user'];
			 
		} 
		$this->view('home/create_account',$viewbag);

		if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
			$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

			if ($this->utility->regexCheck($username, $password, $email)) {
				if (sizeof($this->model('User')->getUserFromUsername($username)) <= 0) {
					$this->model('User')->createUser($username, $email, password_hash($password, PASSWORD_DEFAULT));
					echo 'user created';
					$_SESSION['user'] = "User created";
					header('Location: /jacso18/mvc/public/home/create_account');
				} else {
					$_SESSION['user'] = "Could not create user";
					header('Location: /jacso18/mvc/public/home/create_account');
					return false;
				}
			} else {
				return false;
			}
		}
	}










	public function loggedout()
	{
		echo 'You are now logged out';
	}
}
