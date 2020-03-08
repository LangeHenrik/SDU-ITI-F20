<?php
  session_start();
  require "header.php";
?>

<html>
<!DOCTYPE html>
    <?php
        if(isset($_SESSION['username'])){
            echo "<a href='./includes/logout.php'></a>";
        } else{
            echo "<script> alert('You have to login to use this function!') </script>";
            echo "<script> location.href = 'index.php' </script>";
        }
    ?>
        <head>
            <link rel="stylesheet" href="./css/style.css">
            <title>User List</title>
        </head>
        <body>
            <div class="content">
                <h1>WELCOME TO THE USER LIST PAGE</h1>
                <h3>BELOW YOU CAN FIND ALL OF THE REGISTERED USERS</h3>
                <?php include './linkdatabase/fetchuserdata.php';?>
            </div>
        </body>
</html>