<?php
  session_start();
?>

<html>
<!DOCTYPE html>
    <?php
        if(isset($_SESSION['username-login'])){
            echo "<a href='./includes/logout.php'></a>";
        } else{
            echo "<h2>Log-in before using this function</h2>";
            echo "location.href = 'index.php'";
        }
    ?>
    <head>
        <title>Upload Your Image</title>
    </head>
    <body>
        <div class="uploadContent" id="uploadContent">
            <b><h1>Upload Image</h1></b>
            <i><h2>Choose your pictures and upload here!</h2></i>
            <form action="" method="post">
                <label for="image">Choose Your Image</label>
                <br><input type="file" name="image" id="image"/><br>
                <label for="image-header">Image Header</label>
                <br><input type="text" name="image-header" placeholder="Write a Title for Your Image"><br>
                <label for="image-description">Image Description</label>
                <br><textarea name="descripion" id="image-description" cols="30" rows="5">Write a Description for Your Image</textarea><br>
                <button type="submit" value="upload" name="image-upload"></button>

            </form>
        </div>
        <?php
            include './linkdatabase/upload_image.php';
        ?>
    </body>
</html>