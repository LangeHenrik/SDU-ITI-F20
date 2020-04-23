<?php

class ImageController extends Controller {
	
	public function index ($param) {
		
	}
	
	public function users () {
		$users = $this->model('User')->getAll();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

    public function register() {
        if ($this->post()) {
            $this->model('User')->register();
            $_SESSION['actual_page'] = 'frontpage';
            header('Location:../front');
        }
    }

    public function login() {
        if ($this->post()) {
            $this->model('User')->login();
            $_SESSION['actual_page'] = 'frontpage';
            header('Location: ../front');
        }
    }

    public function logout() {
        if ($this->post()) {
            $this->model('User')->logout();
            $_SESSION['actual_page'] = 'frontpage';
            header('Location: ../front');
        }
    }

    public function list() {
        $results = $this->model('User')->getAll();
        $_SESSION['actual_page'] = 'userlist';
        $this->view('users/list', $results);
    }

}
?>