<?php

class HomeController extends Controller {
	// Main / home / default - page.
	public function index ($param) {
		//This is a proof of concept - we do NOT want HTML in the controllers!
		//echo '<br>Home Controller Index Method<br>';
		//echo 'Param: ' . $param . '<br><br>';
		$this->view('home/index');
	}

	// reach registration page.
	public function signup() {
		if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
			$this->view('home/registration');
		}
		else {
			header('Location: ' . BASE_URL . 'home/index');
		}
	}

	// createUser is only available with post method.
	public function createUser() {
		if ($this->post()) {
			if ($this->model('User')->createUser()) {
				$this->view('home/index');
			}
			else {
				// Posibly some error handling;
				$this->view('home/index');
			}
		}
		else {
			// You can only create user with post method
			$this->view('home/index');
		}
	}

	// Feed page is added in restrictions
	public function feed() {
		$picture = $this->model('Picture');
		$viewbag = $picture->getPictures();
		$this->view('home/feed', $viewbag);
	}

	// Users page is restricted
	public function users() {
		$user = $this->model('User');
		$viewbag = $user->getAll();
		$this->view('home/users', $viewbag);
	}

	// Upload is restricted
	public function upload() {
		$picture = $this->model('Picture');
		$viewbag = $picture->getPictures($_SESSION['username']);
		$this->view('home/upload', $viewbag);
	}

	public function other ($param1 = 'first parameter', $param2 = 'second parameter') {
		$user = $this->model('User');
		$user->name = $param1;
		$viewbag['username'] = $user->name;
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
		$this->view('home/index', $viewbag);
	}

	// login is only available with post method.
	public function login() {
		if ($this->post()) {
			if($this->model('User')->login()) {
				$_SESSION['logged_in'] = true;
				header('Location: ' . BASE_URL . 'home/feed');
			}
			else {
				$_SESSION['loginFailed'] = true;
				header('Location: ' . BASE_URL . 'home/index');
			}
		}
		else {
			header('Location: ' . BASE_URL . 'home/index');
		}
	}

	// logging out is restricted
	public function logout() {
		session_unset();
		header('Location: ' . BASE_URL . 'home/index');
	}

	public function page401() {
		$this->view('home/401');
	}
}
