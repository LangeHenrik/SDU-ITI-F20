<?php

class HomeController extends Controller
{

	public function index($param)
	{
		//This is a proof of concept - we do NOT want HTML in the controllers!
		$viewbag = array();

		if (isset($_SESSION['username'])) {
			$viewbag['logged_in'] = true;
		}

		$this->view('home/index', $viewbag);
	}

	public function other($param1 = 'first parameter', $param2 = 'second parameter')
	{
		$user = $this->model('User');
		$user->name = $param1;
		$viewbag['username'] = $user->name;
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
		$this->view('home/index', $viewbag);
	}

	public function restricted()
	{
		echo 'Welcome - you must be logged in';
	}

	public function login($username)
	{
		/*if ($this->model('User')->login($username)) {
			$_SESSION['logged_in'] = true;
			$this->view('home/login');*/

		$userResult = $this->dbcontroller->getUserByUsername($username);
		foreach ($userResult as $user) {
			if ($user['username'] == $username && password_verify($password, $user['password'])) {
				return true;
			} else {
				return false;
			}
		}
		return false;
	}


	public function register()
	{
		$this->view('home/register');
	}

	public function logout()
	{


		//if($this->post()) {
		session_unset();
		header('Location: /Exercises/mvc/public/home/loggedout');
		//} else {
		//	echo 'You can only log out with a post method';
		//}
	}

	public function loggedout()
	{
		echo 'You are now logged out';
	}
}
