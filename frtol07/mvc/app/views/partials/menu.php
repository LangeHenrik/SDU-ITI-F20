<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include 'CSS/style.css'; ?></style>
        <script><?php include 'js/js.js'; ?></script>

</head>
<body>

<!-- !isset($_REQUEST["search"]) is to avoid Menu showing in ajax call-->

<?php

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && !isset($_REQUEST["search"])) : ?>


    <h1 class="label">Assignment 2 frtol07</h1>
    <div>
        <a href="/frtol07/mvc/public/home/logout">
<!--            <a href="logout">-->
            <button class="btn">Log out</button>
        </a>
    </div>

    <div>
        <a href="/frtol07/mvc/public/home/upLoadView">
<!--        <a href="upLoadView">-->
            <button class="btn"> Upload
            </button>
        </a>
    </div>

    <div>
        <a href="/frtol07/mvc/public/home/userMenuView">
<!--        <a href="userMenuView">-->
            <button class="btn"> Users
            </button>
        </a>
    </div>

    <div>
        <a href="/frtol07/mvc/public/home/index">
<!--        <a href="index">-->
            <button class="btn"> Home</button>
        </a>
    </div>

    <div>
        <a href="/frtol07/mvc/public/home/blobs">
<!--        <a href="blobs">-->
            <button class="btn"> Home blobs</button>
        </a>
    </div>

<?php endif; ?>


