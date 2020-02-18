<?php
session_start();
if(!$_SESSION["logged_in"]){
    header("Location:login.php");
    exit;
}

?>
Congratulation! You have logged into password protected page. <a href="logout.php">Click here</a> to Logout.




