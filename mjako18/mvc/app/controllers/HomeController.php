<?php

class HomeController extends Controller {
	
	public function index ($param) {
		$viewbag["Title"] = "Home";
    $viewbag["currentPage"] = "home";
    $viewbag["inside"] = $this->model('Account')->isLoggedin();
    $this->view("home/index", $viewbag);

	}
	
	public function other ($param1 = 'first parameter', $param2 = 'second parameter') {
		$user = $this->model('Account');
		$user->name = $param1;
		$viewbag['username'] = $user->name;
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
		$this->view('home/index', $viewbag);
	}
	
	public function login() {

    $pass_regex = "/^(?=(?:[^A-Z]*[A-Z]){1})(?=[^!$&¤_-]*[!$&¤_-])(?=(?:[^0-9]*[0-9]){1}).{8,}$/";
    $user_regex = "/([a-zA-ZÆØÅæøå]|\d*|[-.,!&? ]*){4,}/";

    $return = array();

    $username = filter_input(INPUT_POST, "username", FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $user_regex)));
    if(!$username) {
       $return += ['error' => 'Invalid username'];
    }

    $password = filter_input(INPUT_POST, "pass", FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $pass_regex)));
    if(!$password) {
       $return += ['error' => 'Invalid password'];
    }
    if(!array_key_exists('error', $return)) {
      $login_result = $this->model('Account')->login(["Username"=>$username, "Password"=>$password]);//$account->login(["Username"=>$username, "Password"=>$password]);
      if($login_result) {
        $return += ['Username' => $username];
      } else {
         $return += ['error' => 'Wrong username or password'];
      }
    }
		
    header("Content-Type: application/json; charset=UTF-8");

    echo json_encode($return);
	}
	
	public function logout() {
		header("Content-Type: application/json; charset=UTF-8");

    $arr = array("loggedOut" => $this->model('Account')->logout());

    echo json_encode($arr);
	}
	
}
