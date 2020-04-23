<?php

class HomeController extends Controller
{

	public function index()
	{
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
			echo '<script>alert("You have already logged in. Wish to create an account?")</script>';
			$this->view('home/registration');
		} else {
			$this->view('home/index');
		}
	}

	public function other($param1 = 'first parameter', $param2 = 'second parameter')
	{
		$user = $this->model('User');
		$user->name = $param1;
		$viewbag['username'] = $user->name;
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
		$this->view('home/index', $viewbag);
	}

	public function login()
	{
		if ($this->post()) {
			$username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
			$password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);

			if ($this->model('user')->login($username, $password)) {
				$_SESSION['logged_in'] = true;
				echo '<script>alert("Log in Success")</script>';
				$this->view('home/UploadPage');
			} else {
				echo '<script>alert("Log in Not Success. Try Again")</script>';
				$this->view('home/index');
			}
		}
	}

	public function logout()
	{
		if ($this->post()) {
			session_unset();
			session_destroy();
			echo '<script>alert("You have been logged out. Redirecting to registration. ")</script>';
			$this->view("home/registration");
		}
	}

	public function showUser(){
		printf($_SESSION["name"]);
	}
}
