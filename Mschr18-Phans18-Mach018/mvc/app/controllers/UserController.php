<?php

class UserController extends Controller {

	public function index () {
		if ($this->isPost()) {
			echo "fail";
		}
		else {
			header('Location: ' . BASE_URL . 'home/index');
		}
	}

	// ********** Methods for when user is not yet logged in **********
	// Registration page.
	public function signup() {
		if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
			$this->view('user/registration');
		}
		else {
			header('Location: ' . BASE_URL . 'home/index');
		}
	}
	// CreateUser is only available with post method.
	public function createUser() {
		if ($this->isPost()) {
			if ($this->model('User')->createUser()) {
				$this->view('home/index');
			}
			else {
				// Posibly some error handling TODO?
				$this->view('home/index');
			}
		}
		else {
			// You can only create user with post method
			$this->view('home/index');
		}
	}
	// Retrieve username wih ajax. 
	public function usernameAvailable() {
		if ($this->isGet()) {
			$this->model('User')->usernameAvailable();
		}
		else {
			header('Location: ' . BASE_URL . 'home/index');
		}
	}
	// login is only available with post method.
	public function login() {
		if ($this->isPost()) {
			if($this->model('User')->login()) {
				$_SESSION['logged_in'] = true;
				header('Location: ' . BASE_URL . 'picture/feed');
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

	// ********** Methods for when user is logged in **********
	// Users page is restricted
	public function users() {
		$user = $this->model('User');
		$viewbag = $user->getAll();
		$this->view('user/users', $viewbag);
	}
	// logging out is restricted
	public function logout() {
		session_unset();
		header('Location: ' . BASE_URL . 'home/index');
	}

}
