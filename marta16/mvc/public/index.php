<?php

// debug information
error_reporting(E_ALL);
ini_set("display_errors", 1);

// start session if none started
if (session_status() == PHP_SESSION_NONE)
	session_start();

// init system
require_once("../app/init.php");

// bootstrap app
$app = new App;