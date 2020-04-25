<?php

class HomeController extends Controller {
	
	public function index ($param) {
		$viewbag["Title"] = "Home";
    $viewbag["currentPage"] = "home";
    $viewbag["inside"] = $this->model('Account')->isLoggedin();
    $this->view("home/index", $viewbag);

	}
	
	public function login() {
/* AJAX CALLS SHOULD BE IN API */
/* LOOK UP THE SERVICE VIDEO */
    $return = ['Success' => false];
    if($this->post()) {
      $login_result = $this->model('Account')->login($_POST);//$account->login(["Username"=>$username, "Password"=>$password]);
      $return['Success'] = $login_result;
      if(!$login_result) {
        $return = ['error' => 'Wrong username or password. Try again.'];
      }
    } else {
      $return = ['Success' => false];
      $return = ['error' => 'Wrong method. Can only use this login with the form on website.'];
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
