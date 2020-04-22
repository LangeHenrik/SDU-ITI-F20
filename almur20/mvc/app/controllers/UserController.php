<?php

class UserController extends Controller {
	
	public function index ($param) {
		
	}
	
	public function users () {
		$users = $this->model('User')->getAll();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

    public function register() {
        if ($this->post()) {
            $this->model('User')->register();
            header('Location:../front');
        }
    }

    public function login() {
        if ($this->post()) {
            $this->model('User')->login();
            header('Location:../front');
        }
    }

}