<?php

class UserController extends Controller
{
    public function index($param)
    {
    }

    
    public function register()
    {
        if ($this->post()) {
			$register_attempt = $this->model('User')->register();
			if($register_attempt){
                //registration succesful
                header('Location: /nipat10/mvc/public/home');
			} else{
                //registration unsuccesful
                header('Location: /nipat10/mvc/public/home/register');
			}
        } else {
            echo 'You can only register with a post method';
        }
    }

    public function users()
    {
        $users = $this->model('User')->getAll();
        echo json_encode($users, JSON_PRETTY_PRINT);
	}
	
	public function login(){
		if ($this->post()) {
			$login_attempt = $this->model('User')->login();
			
            //Send message to login view
            header('Location: /nipat10/mvc/public/home/index');	
			
        } else {
            echo 'You can only register with a post method';
        }
	}
}
