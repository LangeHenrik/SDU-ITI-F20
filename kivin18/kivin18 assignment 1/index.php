<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
$correct_username = "john";
$correct_password = "1234";

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($username == $correct_username && $password == $correct_password) {
    $_SESSION["logged_in"] = true;
} else {
    $_SESSION["logged_in"] = false;
}

if ($_SESSION["logged_in"]) :
    ?>
    <form method="post">
        <input type="submit" value="Log out"/>
    </form>
<?php else : ?>
    <form id="form" name="form" method="post">
        <label for="username">Name</label>
        <br>
        <input type="text" name="username" id="username"/>
        <label class="inputInfo" id="invalidName"></label>
        <br>
        <label for="password">Password</label>
        <br>
        <input type="password" name="password" id="password"/>
        <label class="inputInfo" id="invalidPass"></label>
        <input type="submit"/>
    </form>
<?php endif; ?>
</body>
</html>
