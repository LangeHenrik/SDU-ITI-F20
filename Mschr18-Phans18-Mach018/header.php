<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
 ?>
<!DOCTYPE html><html>
  <head>
    <title>ChalkBoard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--stylesheet-->
    <link rel="stylesheet" type="text/css" href="include/style.css">
    <!--Fontawsome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--reuse loginnav-->
  </head>
  <!--Comment-->
  <body>
    <header>
      <?php
        if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in']) ) {
          include_once('Include/phpUtils/navMain.php');
        } else {
          include_once('Include/phpUtils/navLogin.php');
        }
      ?>
    </header>
