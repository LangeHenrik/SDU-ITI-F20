<?php

class HomeController extends Controller
{

	public function index()
	{
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
			$this->view('home/SignUp');
		} else {
			$this->view('home/index');
		}
	}

	public function login()
	{
		if ($this->post()) {
			if ($this->model('user')->login()) {
				$_SESSION['logged_in'] = true;
				echo "<script> alert('Logged in!') </script>";
				$this->view('home/Upload');
			} else {
				echo "<script> alert('Log-in failed! Please check your username and password!') </script>";
				$this->view('home/index');
			}
		}
	}

	public function logout()
	{
		if ($this->post()) {
			session_unset();
			session_destroy();
			echo "<script> alert('Logged out!') </script>";
			$this->view("home/index");
		}
	}
}