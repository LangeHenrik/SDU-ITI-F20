<?php
  header("Content-Type: application/json; charset=UTF-8");

  require_once "./config.php";

  $return = ["loggedIn" => $account->isLoggedIn()];

  echo json_encode($return);
