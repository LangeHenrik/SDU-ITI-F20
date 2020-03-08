<?php
header("Content-type: text/html;charset=utf-8");
$dbh = new PDO("mysql:host=127.0.0.1;dbname=itassignment1_pics", "root", "yan13641397589");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
