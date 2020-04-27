<?php

class HomeController extends Controller
{
	public function __construct()
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	}

	public function index($param)
	{
		header('Location: /alhen20_chset20/mvc/public/home/login');

	}

	public function restricted()
	{
		echo 'You must be logged in to view this page';
	}

	public function login()
	{
		$viewbag['error'] = "";
		if (isset($_SESSION['error'])){
			$viewbag['error'] = $_SESSION['error'];
			$_SESSION['error'] = '';
		}
		$this->view('home/login',$viewbag);

		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
			$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
			if ($this->model('user')->checkUser($username, $password)) {
				$_SESSION['logged_in'] = true;
				$_SESSION['username'] = $username;
				$_SESSION['error'] = '';
				header('Location: /alhen20_chset20/mvc/public/picture/image_feed');
			} else {
				$_SESSION['error'] = 'Wrong username or password';
				header('Location: /alhen20_chset20/mvc/public/home/login');
			}
		}
	}

	public function logout()
	{
		session_destroy();
		header('Location: /alhen20_chset20/mvc/public/home/index');
	}

	public function register()
	{
		$viewbag['res'] = "";
		if (isset($_SESSION['res'])){
			$viewbag['res'] = $_SESSION['res'];
			$_SESSION['res'] = '';
		}
		$this->view('home/register',$viewbag);

		if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
			$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
			if (sizeof($this->model('User')->getUser($username)) <= 0) {
				$this->model('User')->createUser($username, $email, password_hash($password, PASSWORD_DEFAULT));
				echo 'user created';
				$_SESSION['res'] = "User created";
				header('Location: /alhen20_chset20/mvc/public/home/register');
			} else {
				$_SESSION['res'] = "Could not create user, username already exist";
				header('Location: /alhen20_chset20/mvc/public/home/register');
				return false;
			}
		}
	}
}
