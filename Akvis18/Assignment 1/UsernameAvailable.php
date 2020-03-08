<?php
include_once "Shared/DBConnect.php";
if (isset($_GET["username"])){
    $user = filter_var($_GET["username"], FILTER_SANITIZE_STRING);
    $r = query("SELECT * FROM `user` WHERE username = ?;" ,[$user]);
    echo (count($r) === 0) ? $user." is available" : $user." is occupied ";
}
