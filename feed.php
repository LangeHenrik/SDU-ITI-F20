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
            <title>Image Feeds</title>
        </head>
        <body>
            <div class="feedContent">
                <h1>WELCOME TO THE IMAGE FEED PAGE</h1>
                <h3>BELOW YOU CAN FIND PICTURES SHARED BY OUR USERS</h3>
                <?php include './linkdatabase/fetchimagedata.php';?>
            </div>
        </body>
</html>