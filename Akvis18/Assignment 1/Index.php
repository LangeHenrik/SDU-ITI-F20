<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION["LoggedIn"]) and $_SESSION["LoggedIn"] == true) {
        header("Location: /Feed.php");
    } else {
         header("Location: /Login.php");
    }