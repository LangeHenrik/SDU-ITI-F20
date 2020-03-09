<?php
session_start();

require_once 'extfiles/config.php';

    if(isset($_POST['upload'])) {
        try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));


        
        $path = "images/".basename($_FILES['profileimage']['name']);
        $image = $_FILES['profileimage']['tmp_name'];
        $imageconvered = base64_encode(file_get_contents(addslashes($image)));

        $header = filter_input(INPUT_POST,"header", FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST,"description", FILTER_SANITIZE_STRING);

        $Imagefiletype = getimagesize($_FILES['profileimage']['tmp_name']);

        
        $query = $conn->prepare("INSERT INTO images (Header, Filetype, description, username, img) VALUES (:header, :imagefiletype, :description, :username, :imageconverted)");
        $query->bindParam(":header",$header);
        $query->bindParam(":imagefiletype", $Imagefiletype['mime']);
        $query->bindParam(":description",$description);
        $query->bindParam(":username",$_SESSION['username']);
        $query->bindParam(":imageconverted",$imageconvered);
        $query->execute(); 
        $query->setFetchMode(PDO::FETCH_ASSOC);
   
        if($query->rowCount()>0) {
            echo "Image uploaded to database";
            }else{
                echo "There was a problem";
            }
    } catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>

    <!DOCTYPE html>

    <?php
if(isset($_SESSION['username'])){
    echo "<br><a href='logout.php'><input type=button value=Logout name=logout></a>";
}
else{
    echo "<script> alert('Please login to procede! Please check your credentials.') </script>";
    echo "<script> location.href = 'index.php' </script>";
}
?>

    <html lang="en">

    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="extfiles/styling.css">

        <title>uploadimage</title>
    </head>

    <body>    
    <div id="frm">
        <div class="container">
            <div class="row">



            <form action="http://localhost:8080/imagefeed.php">
                <input type="submit" value="Go to main menu" />
                </form>
                <form action="uploadimage.php" method="POST" enctype="multipart/form-data">
            
                    <h3 class="text-center">Upload image</h3>

                    <label for="Header">Title for image</label>
                    <br>
                    <input type="text" name="header">
                    <br>
                    <br>
                    <label for="profileimage">Choose image</label>
                    <input type="file" accept="image/*" name="profileimage">
                    <br>
                    <br>
                    <label for="Description">Description</label>
                    <br>
                    <textarea name="description" id="description" class="form-control" 
                    placeholder="Describe your image..."></textarea>
                    
                    <button type="submit" name="upload" class="btnupload btnupload-primary btnupload-block">Upload Image</button>

                </form>

            </div>
        </div>
    </div>

    </body>

    </html>