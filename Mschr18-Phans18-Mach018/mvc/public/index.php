<?php

if (session_status() == PHP_SESSION_NONE ) {
	session_start();

	$_SESSION['page_titel'] = "ChalkBoard";
}

require_once '../app/init.php';

$router = new Router();
