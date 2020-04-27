<?php

class HomeController extends Controller {
	
	public function index ($param) {
		//This is a proof of concept - we do NOT want HTML in the controllers!
		//echo '<br><br>Home Controller Index Method<br>';
		//echo 'Param: ' . $param . '<br><br>';

		$this->view('home/loginpage');
	}
	
	public function other ($param1 = 'first parameter', $param2 = 'second parameter') {
		$user = $this->model('User');
		$user->name = $param1;
		$viewbag['username'] = $user->name;
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
		$this->view('home/index', $viewbag);
	}
	
	public function restricted () {
		echo 'Welcome - you must be logged in';
	}
	
	public function login($usernameinput) {
		if($this->model('User')->login($usernameinput)) {
             $status =  $_SESSION['logged_in'] = true;		 
  			$this->view('home/login', $status);
		} else {

			$this->view('home/loginpage');
		}
	}


	public function homepage($usernameinput){

		$this->view('home/index');


	}



	public function registration(){

		$this->view('home/registration');
	}
	public function logout() {
		
		
		if($this->post()) {
			session_unset();
			header('Location: /qanuu18/mvc/public/home/loggedout');
		} else {
			echo 'You can only log out with a post method';
	}
}

	public function loggedout() {
		echo 'You are now logged out';

		$this->view('home/loginpage');

	}

	public function Loginpage(){
		$this->view('home/loginpage');


	}
	
	public function register() {


        if($this->post()){

		 $register = $this->model('User')->registeruser();

		 if( $register){
			header('location: /qanuu18/mvc/public/home/loginpage');


		 } else {
                     $this->view('home/registration', $register);


		 }
           
            
        
            //echo json_encode($users, JSON_PRETTY_PRINT);
        
		 } else  { 


        header('Status: 403 Nou No Not Have Access To This Page');
        echo '403 Forbidden';
    }



	
}
}