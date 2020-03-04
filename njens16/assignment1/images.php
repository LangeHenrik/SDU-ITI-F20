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
 <?php
session_start();
if(isset($_SESSION["user_id"]) && isset($_SESSION["logged_in"]))
{
?>
       <nav class="menu">
            <a href="index.php">Home</a> 
            <a class="active" href="images.php">Images</a>
            <a href="users.php">Users</a>
            <a href="logout.php">Logout</a>
        </nav>
        </div>
        <div class="wrapper">
            <div class="frame">
            <div class="content">
                <p>Images</p>
<?php
}
else
{
    header("Location: index.php");
}
?>
        </div>
        </div> 
    </body>
</html>
