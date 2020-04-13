<?php

class UserController extends Controller {
	
	public function index ($param) {	
	}
	public function register($username, $password) {
            if ($this->post()){
                $this->model('User')->register($username,$password);
                echo $username . ' has been registered';
            } else {
                header('Status: 403 You Do Not Have Access To This Page');
                echo '403 Forbidden';
            }
   
	}
        public function login() {
		if($this->model('User')->login()) {
			
			$this->view('home/login');
		}
	}
}