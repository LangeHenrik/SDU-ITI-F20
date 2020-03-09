<?php
  header("Content-Type: application/json; charset=UTF-8");
  require_once "./config.php";
  $return = array();
  echo json_encode($account->getAccountList());
?>