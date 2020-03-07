<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Assignement 1</title>
        <link rel="stylesheet" href="style.css" type="text/css" media="all">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all">
 
    </head>
    <body>
        <div class="header">
            <h1>Assignement 1</h1>
            <nav class="menu">
            <a class="active" href="index.php">Home</a> 
<?php
session_start();
if(isset($_SESSION["user_id"]) && isset($_SESSION["logged_in"]))
{
?>
            <a href="images.php">Images</a>
            <a href="users.php">Users</a>
            <a href="logout.php">Logout</a>
        </nav>
        </div>
        <div class="wrapper">
            <div class="frame">
            <div class="content">
                <p><b>Welcome </b><br/>
                This is Nicholai Bjerke Jensen (njens16) answer to Assignment 1 in the course IT-2020</p>
<?php
}
else
{
?>
        </nav>
        </div>
        <div class="wrapper">
            <div class="frame">
            <div class="content">
 
                <div class="login">
                <form action="login.php" method="post" accept-charset="utf-8">
                    <input type="text" value="" name="username" placeholder="Username" id="username"/> <br/>
                    <input type="password" value="" name="password" placeholder="Password" id="password"/>    <br/>
                <button type="submit" value="login" id="submit">Login</button>
                </form>
                <a href="register.php">Create new user</a>
            </div>
            </div>
            </div>

<?php
}
?>
 
    </body>
</html>
