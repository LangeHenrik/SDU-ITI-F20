<?php
  header("Content-Type: application/json; charset=UTF-8");

  require_once "./config.php";

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
    $login_result = $account->login(["Username"=>$username, "Password"=>$password]);
    if($login_result) {
      $return += ['Username' => $username];
    } else {
       $return += ['error' => 'Wrong username or password'];
    }
  }

  echo json_encode($return);
