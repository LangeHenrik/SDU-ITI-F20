<?php

class HomeController extends Controller {
	
    public function index ($param) 
    {
        header('Location: /njens16/mvc/public/home/frontpage');
	}
	
    public function frontpage () 
    {
		$viewbag['page'] = "home";
		$this->view('home/index', $viewbag);
	}
    
    public function images()
    {
        $viewbag['page'] = "images";
        
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
        $this->view("home/images", $viewbag);
    }

    public function users()
    {
        $viewbag['page'] = "users";
        $viewbag["users"] = $this->model("User")->getAll();
        $this->view("home/users", $viewbag);
    }

    public function restricted () 
    {
		echo 'Welcome - you must be logged in';
	}
	
	public function login($username) {
        if($this->model("User")->login($username)) 
        {
			$_SESSION["logged_in"] = true;
		    $viewbag["page"] = "home";
			$this->view("home/login", $viewbag);
        }
        else
        {
            //error logging in
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
	
}
