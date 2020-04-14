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

    public function restricted () 
    {
		echo 'Welcome - you must be logged in';
	}
   
}
