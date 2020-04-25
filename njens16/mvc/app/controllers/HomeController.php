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
    
    public function restricted () 
    {
		echo 'Welcome - you must be logged in';
	}
   
}
