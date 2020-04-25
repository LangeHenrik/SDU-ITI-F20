<?php

class RegisterController extends Controller {
  public function index ($param) {
    $viewbag["Title"] = "Register account";
    $viewbag["currentPage"] = "register";
    $viewbag["inside"] = $this->model('Account')->isLoggedin();
    $this->view("register/index", $viewbag);
	}

  public function register_account() {
    header("Content-Type: application/json; charset=UTF-8");

    $return = array();

    $createAccount_result = $this->model('Account')->createAccount();//["Username"=>$username, "Password"=>$password]);
    if($createAccount_result) {
      $return = ['Username' => $username];
    } else {
       $return = ['error' => 'Invalid username or password.']; // Something went wrong with the database
    }

    echo json_encode($return);
  }
}
