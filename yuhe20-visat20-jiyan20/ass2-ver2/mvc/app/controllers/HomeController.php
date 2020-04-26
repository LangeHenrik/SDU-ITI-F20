<?php

class HomeController extends Controller {
	
	public function index ($param) {
		//This is a proof of concept - we do NOT want HTML in the controllers!
		echo '<br><br>Home Controller Index Method<br>';
		echo 'Param: ' . $param . '<br><br>';
	}
/*	
	public function other ($param1 = 'first parameter', $param2 = 'second parameter') {
		$user = $this->model('User');
		$user->name = $param1;
		$viewbag['username'] = $user->name;
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
		$this->view('home/index', $viewbag);
	}
*/	
	public function restricted () {
		echo 'Welcome - you must be logged in';
	}
	
	public function login($username) {
		$viewbag['title'] = 'Login';
		if (isset($_POST['login'])) {
		    $username = filter_var($_POST['usernameCon'], FILTER_SANITIZE_STRING);
		    $password = filter_var($_POST['passwordCon'], FILTER_SANITIZE_STRING);
		    if (!empty($username) AND !empty($password)) {
		 		$res = $this->model('User')->login($username);
		        $isPasswordCorrect = password_verify($password, $res['password']);
		        // Check if the user exist in the database
		        if (!$res) {
		            $viewbag['error'] = "This username is not in the database";
		        } else {
		            if ($isPasswordCorrect) {
		                $_SESSION['id']       = $res['id_user'];
		                $_SESSION['username'] = $res['username'];
		                $_SESSION['mail']     = $res['email'];
						header('Location:'.URL.'home');
		            }
		            // Check if the password match the databse
		            else {
		                $viewbag['error'] = "Wrong password/Username combination. Please try again";
		            }
		        }
		    } else {
		        $viewbag['error'] = "Complete all fields";

		    }
		}
		$this->view('home/login', $viewbag);
	}
	}

/*
	public function logout() {
		
		
		//if($this->post()) {
			session_unset();
			header('Location: /Exercises/mvc/public/home/loggedout');
		//} else {
		//	echo 'You can only log out with a post method';
		//}
	}
	
	public function loggedout() {
		echo 'You are now logged out';
	}
*/	
}