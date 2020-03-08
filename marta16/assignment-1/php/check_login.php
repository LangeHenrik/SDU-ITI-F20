<?php

// start session
session_start();

// check if a user is logged in
if (!isset($_SESSION["username"]) && $_SESSION["username"] == "") {
  header('HTTP/1.0 403 Forbidden');
  die();
}

// echo success if script requested from AJAX (POST method)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo("success");
}

?>