<html>
    <head>
    <script src="/abtho16/mvc/public/content/js/js.js"></script>
    <link rel="stylesheet" href="/abtho16/mvc/public/content/css/style.css" />
    </head>
<body>

<?php if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) : ?>
<ul>
  <li><a class="active" href="/abtho16/mvc/public/home/index">Home</a></li>
  <li><a href="/abtho16/mvc/public/home/login">Login</a></li>
  <li><a href="/abtho16/mvc/public/home/register">Register</a></li>
  <li><a href="https://www.sdu.dk/da">SDU</a></li>
  <li><a href="https://www.google.dk/?hl=da">Google</a></li>
</ul>
<?php endif; ?>


<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
    <ul>
        <li><a class="active" href="/abtho16/mvc/public/home/index">Home</a></li>
        <li><a href="/abtho16/mvc/public/user/index">Users</a></li>
        <li><a href="/abtho16/mvc/public/picture/upload">Upload</a></li>
        <li><a href="/abtho16/mvc/public/home/logout">Logout</a></li>
    </ul>
<?php endif; ?>