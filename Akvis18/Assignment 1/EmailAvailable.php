<?php
include_once "Shared/DBConnect.php";
if (isset($_GET["email"])){
    $email = filter_var($_GET["email"], FILTER_SANITIZE_STRING);
    $r = query("SELECT email FROM `user` WHERE email = ?;" ,[$email]);
    echo (count($r) === 0) ? $email." is available" : $email." is occupied ";
}
