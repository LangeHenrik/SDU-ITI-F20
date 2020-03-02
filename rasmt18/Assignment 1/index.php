<!DOCTYPE html>
<?php
    echo "<br><a href='logout.php'><input type=button value=Logout name=logout></a>";
?>
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
        <form class="login" name="login" method="GET" action="ImageFeed.php">
            <fieldset>
                <legend>Please enter your credentials to login</legend>
                <label for="username">Username</label>
                <br>
                <input type="text" name="username" autofocus autocomplete="off" required>
                <br>
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" required>
                <br>
                <input type="submit" name="submit" id= "submit" value="Login" >
            </fieldset>
        </form>
        <p>Don't have an account yet, don't worry. Just enter the registration page in the link below</p>
        <a href="Registration.php">Registration page</a>
        </form>
    <div>
</body>
</html> 
