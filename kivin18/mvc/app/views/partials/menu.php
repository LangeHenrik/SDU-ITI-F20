<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
</head>
<body>
<div id="banner">
    <h1>Image Feed</h1>
</div>

<div style="background-color: lightblue;">Menu partial view</div>
<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
    <a href="/kivin18/mvc/public/user/logout">log out</a>
<?php endif; ?>
<div class="wrapper">
