<?php
//  header("Content-Type: application/json; charset=UTF-8");

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  require_once "./config.php";

  $arr = array("loggedOut" => $account->logout());

  echo json_encode($arr);
