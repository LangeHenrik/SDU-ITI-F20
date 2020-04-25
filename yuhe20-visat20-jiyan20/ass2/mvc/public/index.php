<?php

if (session_status() == PHP_SESSION_NONE ) {
	session_start();
}

require_once '../app/init.php';

require "../app/views/partials/header.php";

$router = new Router();