<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styling.css">
    <title>Front Page</title>
</head>
<body>
    <div class="content">
        <script src="./javascript/Menu.js"></script>
        <h1>ITI - Assignment 1</h1>
        <p>Group Members</p>
        <ul>
            <li>Mathias Tryggedsson</li>
            <li>Rasmus Thomsen</li>
            <li>Søren Pederson</li>
        </ul>
        <form class="login" name="login" method="POST">
            <fieldset>
                <legend>Please enter your credentials to login</legend>
                <label for="username">Username</label>
                <br>
                <input type="text" name="username" autofocus>
                <br>
                <label for="password">Password</label>
                <br>
                <input type="password" name="password">
                <br>
                <input type="submit" name="submit" id= "submit" value="Login >
            </fieldset>
        </form>
        <p>Don't have an account yet, don't worry. Just enter the registration page in the link below</p>
        <a href="registration.php">Registration page</a>
</form>
    <div>
</body>
</html> 

<?php
    if (isset($_POST['submit'])) {
        $un=$_POST['username'];
        $pw=$_POST['Passw0rd8'];
        $wrongpw="Invalid password!";
        $wrongun="Invalid username!";

        if ($un=='username' && $pw=='Passw0rd8') {
            header("location:ImageFeed.php");
            exit();
        } elseif ($un != 'username' && $pw == 'Passw0rd8') {
           echo "<p align=center>$wrongun </p>";
        } elseif ($un=='username' && $pw!='Passw0rd8') {
           echo "<p align=center>$wrongpw </p>";
        }
        else
            echo "<p align=center>$wrongun And $wrongpw </p>";
    }

?>
