<?php

class HomeController extends Controller
{

	public function index()
	{
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
			echo '<div><h3 id="popUp">You are already logged in, and cannot access the login page.</h3></div>';
			$this->view('home/registration');
		} else {
			$this->view('home/index');
		}
		//$this->nameOfUser();
	}

	public function login()
	{
		if ($this->post()) {
			if ($this->model('user')->login()) {
				$_SESSION['logged_in'] = true;
				echo '<div><h3 id="popUp">Login Successful</h3></div>';
				$this->view('home/uploadPage');
			} else {
				echo '<div><h3 id="popUp">Login failed. Username or Password is incorrect.</h3></div>';
				$this->view('home/index');
			}
		}
	}

	public function logout()
	{
		if ($this->post()) {
			session_unset();
			session_destroy();
			echo '<div><h3 id="popUp">You have been logged out successfully</h3></div>';
			$this->view("home/registration");
		}
	}
}