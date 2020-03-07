 <?php
require_once "config.php";
session_start();
if(isset($_SESSION["user_id"]) && isset($_SESSION["logged_in"]))
{
    //Image upload script start: 
    $upload_message = "";
    $error_message = "";
    if(isset($_POST["submit"]) )
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) 
        {
            $uploadOk = 1;
        } 
        else 
        {
            $upload_message = "File is not an image.";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file)) 
        {
            $upload_message = "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 10000000) 
        {
            $upload_message = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG" ) 
        {
            $upload_message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if($_POST["image_header"] == NULL && $uploadOk ==1)
        {
            $upload_message = "Sorry, image must have a header";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) 
        {
            $error_message = "Your file was not uploaded.";
            // if everything is ok, try to upload file
        } 
        else 
        {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
            {
                $upload_message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $image_header = trim($_POST["image_header"]);
                $image_description = trim($_POST["image_description"]);
                try
                {
                    $conn = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "INSERT INTO image(image_header, image_description, image_path, upload_user_id) VALUES('$image_header', '$image_description', '$target_file', '".$_SESSION["user_id"]."')";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                }
                catch(PDOException $e)
                {
                    echo "Conneciton failed: " . $e->getMessage();
                }
            } 
            else 
            {
                $error_message = "There was an error uploading your file.";
            }
        }
    }
    //Image upload script end.
?>
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
            <a href="index.php">Home</a> 
            <a class="active" href="images.php">Images</a>
            <a href="users.php">Users</a>
            <a href="logout.php">Logout</a>
        </nav>
        </div>
        <div class="wrapper">
            <div class="frame">
            <div class="content">
            <button onclick="show_upload()" id="upload_btn" class="upload_btn">Upload image</button>
            <div class="upload" id="upload">
                <form action="#" method="post" enctype="multipart/form-data">
                <table>
                    <tr><td><input type="text" name="image_header" id="image_header" placeholder="Image Header"/></td></tr>
                    <tr><td><textarea name="image_description" id="image_description" placeholder="Image Description" rows="8" cols="40"></textarea> </tr></td>
                    <tr><td><label class="selectFile">Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload"></label></td></tr>
                    <tr><td><input type="submit" value="Upload Image" name="submit"></td></tr>
                </table>
                </form>
                </div>
            <p><?php echo $upload_message;?></p>
            <p><?php echo $error_message;?></p>


        </div>
        </div> 
    <script type="text/javascript">
    function show_upload()
    {
        document.getElementById("upload").style.display = "block"
        document.getElementById("upload_btn").style.display = "none"
    }
    </script>
    </body>
</html>
<?php


}
else
{
    header("Location: index.php");
}
?>

