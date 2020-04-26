<html>
    <head>
    <script src="/abtho16/mvc/public/content/js/js.js"></script>
    <link rel="stylesheet" href="/abtho16/mvc/public/content/css/style.css" />
    </head>
<body>

<ul>
<li><a class="active" href="/mvc/public/home/index">Home</a></li>
  <li><a href="/abtho16/mvc/public/user/index">Users</a></li>
  <li><a href="/abtho16/mvc/public/picture/upload">Upload</a></li>
  <li><a href="/abtho16/mvc/public/home/login">Logout</a></li>
</ul>

<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>

<a href="/abtho16/mvc/public/user/logout">log out</a>

<?php endif; ?>

