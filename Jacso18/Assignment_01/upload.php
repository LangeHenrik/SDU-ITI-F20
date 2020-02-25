<?php
    include 'includes/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">   
    <head>
        <title>Upload image</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
    </head>
    <body>
        <ul class="menu">
            <li><a href="image_feed.php">Image feed</a></li>
            <li><a href="upload.php">Upload picture</a></li>
            <li><a href="#">Users</a></li>
        </ul>
        
        <div class="uploadarea">

            <form id="uploadform">
                
                <label for="file">Select a file:</label>
                <br>
                <input type="button" id="loadFile" value="file" onclick="document.getElementById('file').click();" />
                <input type="file" style="display:none;" id="file" name="file"/>
                <br>
                <textarea id="comment" name="comment" rows="4" cols="50" maxlength="150" placeholder="Write a comment"></textarea>
                <br>
                <input type="submit" name="upload" id="upload" value="upload">
            </form>


        </div>
         

        <h1> This is the upload page </h1>
        

        <form method="POST">
            <input type="submit" name="logout" id="logout" value="Logout"/>
        </form>
        <?php
            if(session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if($_SESSION['logged_in'] == false){
                header ("Location: index.php");
            }  

            
            if(isset($_POST['logout'])) {
                echo 'logout';
                $_SESSION['logged_in'] = false;
                header ("Location: index.php");
            }

        ?>

    </body>
</html>