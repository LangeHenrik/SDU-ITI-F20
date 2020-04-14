<?php

class UserController extends Controller {
  public function index ($param) {
    $viewbag["Title"] = "User account";
    $viewbag["currentPage"] = "user";
    $viewbag["inside"] = $this->model('Account')->isLoggedin();
    $this->view("user/index", $viewbag);
	}

  public function userlist() {
    $return = $this->model('Account')->getAccountList();
    header("Content-Type: application/json; charset=UTF-8");

    echo json_encode($return);
  }
}
