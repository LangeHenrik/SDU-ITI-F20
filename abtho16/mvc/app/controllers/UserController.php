<?php

require_once '../app/models/User.php';

class UserController extends Controller {

	public function index() {
        if(isset($_SESSION['logged_in']) == true and $_SESSION['logged_in'] == true) {
			$viewbag['users'] = $this->model('User')->getUsers();
			$this->view('user/index', $viewbag);
        } else {
            header('Location: home');
        }
	}

	public function create() {
		$this->view('user/create');
	}



}
