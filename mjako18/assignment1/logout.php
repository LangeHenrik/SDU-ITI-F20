<?php
  header("Content-Type: application/json; charset=UTF-8");

  require_once "./config.php";

  $arr = array("loggedOut" => $account->logout());

  echo json_encode($arr);
