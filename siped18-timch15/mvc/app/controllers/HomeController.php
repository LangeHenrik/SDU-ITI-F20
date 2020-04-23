<?php

class HomeController extends Controller
{

	public function index($param)
	{
		$viewbag = [];
		$this->view('home/index', $viewbag);
	}



	public function restricted()
	{
		echo 'Welcome - you must be logged in';
	}

	public function login($username)
	{
		if ($this->model('User')->login($username)) {
			$_SESSION['logged_in'] = true;
			$this->view('home/login');
		}
	}

	public function logout()
	{
		if ($this->post()) {
			session_unset();
			header('Location: /siped18-timch15/mvc/public/home/loggedout');
		} else {
			echo 'You can only log out with a post method';
		}
	}

	public function loggedout()
	{
		header('Location: /siped18-timch15/mvc/public/home');
	}
}
