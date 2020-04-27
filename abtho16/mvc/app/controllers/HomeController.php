<?php

class HomeController extends Controller {
	/*
	public function index ($param) {
		//This is a proof of concept - we do NOT want HTML in the controllers!
		echo '<br><br>Home Controller Index Method<br>';
		echo 'Param: ' . $param . '<br><br>';
	}*/

	public function index(){

		$this->view('home/index');
	}

	public function test(){
		$this->view('user/test');
	}
	
	public function register(){
		$this->view('user/register');
	}

	public function login() {
		$this->view('home/login');
	}
	/*
	public function other ($param1 = 'first parameter', $param2 = 'second parameter') {
		$this->view('home/index');
	}
	*/
	public function restricted () {
		echo 'Welcome - you must be logged in';
	}
	// Test but it can be called also from UserController
	public function getusers() {
		$this->view('user/index');
	}

	// Test but it can be called also from pictureController
	public function upload() {
		$this->view('picture/upload');
	}
	// Test but it can be called also from pictureController
	public function showPictures() {
		$this->view('picture/index');
	}

	/*
	public function login($username) {
		if($this->model('User')->login($username)) {
			$_SESSION['logged_in'] = true;
			$this->view('home/login');
		}
	}*/
	public function loginVal() {
		if ( ! empty( $_POST ) ) {
			if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {

				$filteredUn = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
				$filteredPw = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
					require_once('../app/core/Database.php');
					$conn = (new Database)->conn;
					//or die("Connect failed: %s\n". $conn -> error);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
					$stmt = $conn->prepare("SELECT * FROM user WHERE username=:username");
					$stmt->bindParam(':username', $filteredUn);
					$stmt->execute();
					$temp = $stmt->fetch();
					$hashedPw = $temp['password_hash'];
					$userid = $temp['userid'];
					if ( password_verify($filteredPw,$hashedPw) ) {
						$_SESSION['username'] = $filteredUn;
						$_SESSION['user_id'] = $userid;
						$_SESSION['valid'] = true;
						$_SESSION['timeout'] = time();
						$_SESSION['logged_in'] = true;
						header("Location: ../home");	
					} else {
						$_SESSION['error'] = "Wrong username or password.";
						session_unset();
						header("Location: login");

					}
				
			}
		}
	}
	//validation 
	public function validate($u, $p) {
		require_once('../public/content/regex.php');
		if(!filter_var($u, FILTER_VALIDATE_REGEXP,array( // validate username
        "options" => array("regexp"=>$unR)))) {
			session_unset();
			$_SESSION['error'] = "...Username not valid.";
			return false;
		} else if(!filter_var($p,FILTER_VALIDATE_REGEXP,array( // validate username
        "options" => array("regexp"=>$pwR)))) {
			session_unset();
			$_SESSION['error'] = "...Password not valid";
			return false;
		} else {
			return true;
		}
	}

	public function logout() {
		
	
			session_unset();
			header('Location: abtho16/mvc/public/home/');
		
			
		
	}
	
	public function loggedout() {
		echo 'You are now logged out';
	}
	
}