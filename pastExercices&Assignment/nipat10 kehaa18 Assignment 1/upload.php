<?php

//Require the header page.
require 'header.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
    //User not logged in. Redirect them back to the login page.
    header('Location: index.php');
    exit;
}

//Required the database connection file.
require 'config.php';

if (isset($_POST['upload'])) {

    $username = $_SESSION['username'];
    $header = strip_tags($_REQUEST['header']);
    $description = strip_tags($_REQUEST['description']);

    $file = $_FILES['file'];
    $name = strip_tags($file['name']);
    $fileTempName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    $target_dir = "gallery/";
    $target_file = $target_dir . basename($name);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //Valid file extensions
    $extensions_arr = array('jpg', 'jpeg', 'png');


    //Check extension of file
    if (in_array($imageFileType, $extensions_arr)) {
        if ($fileError === 0) {
            if ($fileSize < 2000000) {

                //Upload file
                if (move_uploaded_file($fileTempName, $target_dir . $name)) {
                    //Insert record
                    $query = "INSERT INTO images(header, username, path, description) VALUES('" . $header . "','" . $username . "','" . $target_file . "','" . $description . "')";

                    $stmt = $db->prepare($query);

                    //Execute the statement and insert the new account.
                    $result = $stmt->execute();

                    //Succesfully uploaded!
?>
                    <script>
                        alert("Succesfully uploaded!");
                        window.location.href = ('upload.php');
                    </script>
                <?php
                    Header("Location: upload.php");
                }
            } else {
                //Filesize to big!
                ?>
                <script>
                    alert("Filesize to big!");
                    window.location.href = ('upload.php');
                </script>
            <?php
            }
        } else {
            //Error uploading the file.
            ?>
            <script>
                alert("There was an error during the upload of the file!");
                window.location.href = ('upload.php');
            </script>
        <?php
        }
    } else {
        //Filetype not allowed.
        ?>
        <script>
            alert("Filetype not allowed!");
            window.location.href = ('upload.php');
        </script>
<?php
    }
}
?>

<!--Form for uploading images via POST-->
<div class="main" align="center">
    <div class="wrapper" id="loginform">
        <h2>Upload Image Form</h2>
        <form method="post" action="upload.php" enctype="multipart/form-data" align="center">
            <p class="login-status"> here you can upload images of the types: *.jpg *.jpeg or *.png!</p>
            <p>with a maximum size of 10 mb</p>
            <hr>
            <label for="header">Header</label>
            <input type="header" placeholder="Enter header here.." id="header" name="header" required><br>

            <label for="description">Description</label>

            <input type="description" placeholder="Enter description here.." id="description" name="description" required><br>
            <input type="file" name="file"><br>
            <input type="submit" name="upload" id="upload" value="Upload Image" />
    </div>
    </form>
</div>
</div>



<?php
//Include the footer page.
include 'footer.php';
?>