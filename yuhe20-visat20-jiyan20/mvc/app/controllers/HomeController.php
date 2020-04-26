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
				echo '<div><h3 id="popUp">Logged in Successfully</h3></div>';
				$this->view('home/Upload');
			} else {
				echo '<div><h3 id="popUp">Login failed. Incorrect username or Password.</h3></div>';
				$this->view('home/index');
			}
		}
	}

	public function logout()
	{
		if ($this->post()) {
			session_unset();
			session_destroy();
			echo '<div><h3 id="popUp">Logged out successfully</h3></div>';
			$this->view("home/SignUp");
		}
	}
}