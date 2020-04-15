<?php

class UserController extends Controller {
	
    public function index () 
    {
        header('Location: /njens16/mvc/public/home/frontpage');
	}
	
    public function login() 
    {
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])
        {
            header("Location: /njens16/mvc/public/home/index");
        }

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
                $viewbag["page"] = "login";
                $viewbag["errMsg"] = "Wrong username or password";
                $this->view("user/login", $viewbag);
            }
        }
        else
        {
            $viewbag["page"] = "login";
            $this->view("user/login", $viewbag);
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
        $viewbag["page"] = "users";
        $viewbag["users"] = $this->model("User")->getAll();
        $this->view("user/userPage", $viewbag);
    }
    
    public function register()
    {
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])
        {
            header("Location: /njens16/mvc/public/home/index");
        }
        $viewbag["page"] = "register";
        if ($this->post())
        {
            if ($this->model("User")->registerUser())
            {
                $viewbag["page"] = "login";
                $viewbag["succsessMsg"] = "User created successfully";
                $this->view("user/login", $viewbag);
            }
            else
            {
                $viewbag["errMsg"] = "Error creating user";
                $this->view("user/registration", $viewbag);
            }
        }
        else
        {
            $viewbag["page"] = "register";
            $this->view("user/registration", $viewbag);
        }
    }


}
