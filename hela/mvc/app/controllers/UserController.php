<?php

class UserController extends Controller {
	
	public function index ($param) {
		
	}
	
	public function register () {
        
        if($this->post()) {
            
            $username = $this->model('User')->register();
            echo $username . ' is registered.';
            
        } else {

            header('Status: 403 You Do Not Have Access To This Page');
            echo '403 Forbidden';

        }
        
	}



}