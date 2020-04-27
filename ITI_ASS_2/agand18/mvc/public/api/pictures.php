<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/core/init.php');

$API = new API;
header('Content-Type: application/json');
if (isset($_GET['id'])) {
    echo $API->getUploadById($_GET['id']);
} else {
    echo $API->uploadImage();
}