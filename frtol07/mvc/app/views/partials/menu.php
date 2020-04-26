<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include 'CSS/style.css'; ?></style>
</head>
<body>

<!-- !isset($_REQUEST["search"]) is to avoid Menu showing in ajax call-->
<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && !isset($_REQUEST["search"])) : ?>

<div>

    <a href="/frtol07/mvc/public/home/logout">
        <button class="btn">Log out</button>
    </a>

    <a href="/frtol07/mvc/public/home/upLoadView">
        <button class="btn"> Upload
        </button>
    </a>

    <a href="/frtol07/mvc/public/home/userMenuView">
        <button class="btn"> Users
        </button>
    </a>

    <a href="/frtol07/mvc/public/home/blobs">
        <button class="btn"> Home</button>
    </a>


<?php endif; ?>


