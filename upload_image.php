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
        <title>Upload Your Image</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <div class="uploadContent" id="uploadContent">
            <b><h1>Upload Image</h1></b>
            <i><h2>Choose your pictures and upload here!</h2></i>
            <form action="" method="post">
                <label for="image">Choose Your Image</label>
                <br><input type="file" name="image-upload" id="image-upload"/><br>
                <label for="image-header">Image Header</label>
                <br><input type="text" name="image-header" placeholder="Write a Title for Your Image"><br>
                <label for="image-description">Image Description</label>
                <br><textarea name="image-description" id="image-description" cols="30" rows="5" placeholder="Write a Description for Your Image"></textarea><br>
                <button type="submit" value="upload" name="image-upload">UPLOAD</button>

            </form>
        </div>
        <?php
            include './linkdatabase/insert_image.php';
        ?>
    </body>
</html>