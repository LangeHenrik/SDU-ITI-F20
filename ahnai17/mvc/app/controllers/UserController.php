<?php

class UserController extends Controller {
	
	public function index () {
            
	}
	public function register() {
            //if ($this->post()){
                $this->model('User')->register();
                $this->view('home/index');
                echo ' has been registered';
            }/* else {
                $this->view('home/index');
                header('Status: 403 You Do Not Have Access To This Page');
                echo '403 Forbidden';
            }
   
	}*/

        public function login() {
		if($this->model('User')->login()) {
	
			$this->view('home/login');
		}
	}
}