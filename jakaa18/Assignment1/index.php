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
<?php echo 'Log in or sign up via the Registration button' ?>
<body>


<form action="welcome.php" method="post">
username: <input type="text" name="username"><br>
password: <input type="password" name="password"><br>
<input type="submit">
</form>


<?php
require("migration/migration.sql");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $_SESSION["logged_in"] = false;
}

?>

</body>