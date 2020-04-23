<?php

class HomeController extends Controller
{
	public function index()
	{
		$this->view('home/index');
	}

	public function login()
	{
		if ($this->post()) {
			$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
			$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

			if ($this->model('User')->login($username, $password)) {
				$_SESSION['logged_in'] = true;
				$_SESSION['currentUser'] = $username;

				header("Location: /siped18-timch15/mvc/public/imagefeed");
				return;
			}
		}
		header("Location: /siped18-timch15/mvc/public");	//login failed, form action redirect quick fix
	}

	public function logout()
	{
		if ($this->post()) {
			session_unset();
			header('Location: /siped18-timch15/mvc/public/home');
		} else {
			echo 'You can only log out with a post method';
		}
	}
}
