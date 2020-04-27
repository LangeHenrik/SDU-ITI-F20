<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/core/init.php');

$API = new API;
header('Content-Type: application/json');
echo $API->getUsers();