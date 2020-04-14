<?php

class UserController extends Controller {
	
    public function index () 
    {
		
	}
	
    public function login($username) 
    {
        if($this->post())
        {
            if($this->model("User")->login()) 
            {
			    $_SESSION["logged_in"] = true;
		        $viewbag["page"] = "home";
                $this->view("home/index", $viewbag);
            }
            else
            {
                echo "error loggin in";
            }
        }
        else
        {
            header("Location: /njens16/mvc/public/home/frontpage");
        }
	}
	
    public function logout() 
    {
	    session_unset();
		header('Location: /njens16/mvc/public/home/loggedout');
	}
	
    public function loggedout() 
    {
        header("Location: /njens16/mvc/public/home/frontpage");
	}
	
    public function users()
    {
        $viewbag['page'] = "users";
        $viewbag["users"] = $this->model("User")->getAll();
        $this->view("user/userPage", $viewbag);
    }



}
