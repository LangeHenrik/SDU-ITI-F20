<?php
session_start();
//This will destroy the sessions
unset($_SESSION['logged_in']);
unset($_SESSION['username']);

header("Location: ../pages/homepage.php");
 ?>
