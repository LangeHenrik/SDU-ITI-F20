<html>
    <head>
    <script src="../js/js.js"></script>
    </head>
    <body>

<div style="background-color: lightblue;">Menu partial view</div>

<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>

<a href="/rayou18,%20kalau17,%20jlaur13/mvc/public/user/logout">log out</a>

<?php endif; ?>

