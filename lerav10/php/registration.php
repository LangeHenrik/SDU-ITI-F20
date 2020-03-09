<?php

require 'includes/dbh.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <ul>
            <li><a href="index.php">Front page</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="registration.php">Registration</a></li>
            <li><a href="upload.php">Upload</a></li>
            <li><a href="image.php">Image</a></li>
            <li><a href="userList.php">UserList</a></li>    
        </ul>

        <div class="registration-form">
        <form action="includes/dbh.php" method="post">
             <p>
                <label>Username:</label>
                <input type="text" id = "user" name = "user" />
            </p>
            <p>
                <label>Password:</label>
                <input type="password" id = "pass" name = "pass" />
            </p>
            <p>
                <input type="submit" id = "btn" value = "Register" />
            </p>
        </form>
    </div>
    
</body>
</html>