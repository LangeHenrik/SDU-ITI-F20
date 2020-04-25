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
		$this->view('home/login');
		if (isset($_SESSION['message'])){
			echo $_SESSION['message'];
		} 
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
			$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
			if ($this->model('user')->isUser($username, $password)) {
				$_SESSION['logged_in'] = true;
				$_SESSION['username'] = $username;
				$_SESSION['message'] = '';
				header('Location: /jacso18/mvc/public/post/image_feed');
			} else {
				$_SESSION['message'] = 'Wrong username or password';
				header('Location: /jacso18/mvc/public/home/index');
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
		$this->view('home/create_account');

		if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
			$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

			if ($this->utility->regexCheck($username, $password, $email)) {
				if (sizeof($this->model('User')->getUserFromUsername($username)) <= 0) {
					$this->model('User')->createUser($username, $email, password_hash($password, PASSWORD_DEFAULT));
					echo 'user created';
					header('Location: /jacso18/mvc/public/home/create_account');
				} else {
					echo 'User already exists';
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
