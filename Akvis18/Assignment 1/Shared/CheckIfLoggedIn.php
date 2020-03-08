<?php
    session_start();
    if (!isset($_SESSION['LoggedIn'])) {
        header("HTTP/1.0 403 Forbidden");
        print "<h1>403 Forbidden</h1>";
        print "Please login before accessing </br>";
        print "You'll be redirected shortly, if not click <a href='/'>here</a>.";
        print "<script src=\"../Scripts/RedirectIndex.js\"></script>";
        exit();
    }