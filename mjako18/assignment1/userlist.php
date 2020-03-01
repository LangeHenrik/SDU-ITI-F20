<?php
  header("Content-Type: application/json; charset=UTF-8");

  require_once "./config.php";

  $return = array();
  
//  var_dump($account->getAccountList());

  echo json_encode($account->getAccountList());
