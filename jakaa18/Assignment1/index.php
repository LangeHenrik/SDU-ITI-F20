<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ITI assignment 1</title>
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

<?php
require("migration/migration.sql");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $_SESSION["logged_in"] = false;
}

?>