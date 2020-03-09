<?php
  header("Content-Type: application/json; charset=UTF-8");

  require_once "./config.php";

  $pass_regex = "/^(?=(?:[^A-Z]*[A-Z]){1})(?=[^!$&¤_-]*[!$&¤_-])(?=(?:[^0-9]*[0-9]){1}).{8,}$/";
  $user_regex = "/([a-zA-ZÆØÅæøå]|\d*|[!$&¤_-]*){4,}/";

  $return = array();

  $username = filter_input(INPUT_POST, "username", FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $user_regex)));
  if(!$username) {
     $return += ['error' => 'Invalid username. Username must be 4 characters long and can consist of letters(capital or not), numbers and these special characters: !$&¤_-'];
  }

  $password = filter_input(INPUT_POST, "pass", FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $pass_regex)));
  
  if(!$password) {
     $return += ['error' => 'Invalid password. Password must be at least 8 characters long, consist of at least 1 capital letter, 1 number and 1 of the following special characters: !$&¤_-'];
  }
  
  if(!array_key_exists('error', $return)) {
    $check_result = $account->checkUsername(["Username"=>$username]);
    
    if($check_result) {
      $return = ['error' => 'Invalid username or password. Could not create account with those credentials.'];
    } else {
      $createAccount_result = $account->createAccount(["Username"=>$username, "Password"=>$password]);
      
      if($createAccount_result) {
        $return = ['Username' => $username];
      } else {
         $return = ['error' => 'Invalid username or password.']; // Something went wrong with the database
      }
    }
  }

  echo json_encode($return);
