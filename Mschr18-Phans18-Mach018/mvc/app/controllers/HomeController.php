<?php

class HomeController extends Controller {

	// Main / home / default - page.
	public function index () {
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
			$picture = $this->model('Picture');
			$viewbag = $picture->getPictures($_SESSION['username']);
			$this->view('home/index', $viewbag);
		}
		else {
			$this->view('home/index');
		}
	}

	public function page401() {
		$this->view('home/401');
	}

	// ********** Methods for when user is not yet logged in **********
	// Registration page.
	public function signup() {
		if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
			$this->view('home/registration');
		}
		else {
			header('Location: ' . BASE_URL . 'home/index');
		}
	}
	// CreateUser is only available with post method.
	public function createUser() {
		if ($this->post()) {
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

	// ********** Methods for when user is logged in **********
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
		$this->view('home/uploadModal', $viewbag);
	}
	// Uploading og pictures
	public function uploadPicture() {
		if ($this->post()) {
			$this->model('Picture')->uploadPicture();
		}
		header('Location: ' . BASE_URL . 'home/index');
	}
	// Delete picture
	public function deletePicture() {
		if ($this->post()) {
			$this->model('Picture')->deletePicture();
		}
		header('Location: ' . BASE_URL . 'home/index');
	}

	// logging out is restricted
	public function logout() {
		session_unset();
		header('Location: ' . BASE_URL . 'home/index');
	}

}
