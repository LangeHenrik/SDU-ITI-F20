<?php
session_start();
unset($_SESSION['logged in']);
header('location: index.php');
