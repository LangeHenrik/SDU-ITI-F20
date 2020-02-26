<?php
  require_once "./config.php";

  $logout = filter_input(INPUT_GET, 'logout');

  if($logout) {
    $account->logout();
    //redirect
  }

  if(!$account->isLoggedIn()) {
    // redirect
  }
?>
