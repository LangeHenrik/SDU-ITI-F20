<?php

class UserController extends Controller {
	


	public function index ($param) {
        
        
        $this->view('home/home');


	}
	
	public function register () {


        if($this->post()){

            $this->model('User')->register();
            $this->view('qannu18/mvc7public/home/registration');
            
            echo $username . ' username is now registered.';
            //echo json_encode($users, JSON_PRETTY_PRINT);


        }
        
    else { 


        header('Status: 403 Nou No Not Have Access To This Page');
        echo '403 Forbidden';
    }
    }

    public function logout(){

        $this->model('User')->logout();
        $this->view('qannu18/mvc7public/home/home');
    }
}

