<?php
session_start();

require_once 'extfiles/config.php';
try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));

    if(isset($_POST['upload'])) {
        $path = "images/".basename($_FILES['profileimage']['name']);

        $image = $_FILES['profileimage']['name'];
        $header = $_POST['header'];
        $description = $_POST['description'];

        $query = $conn->prepare("INSERT INTO images(title, description, image) VALUES ('$header', '$description', '$image')");
        $query->execute(); 
        $query->setFetchMode(PDO::FETCH_ASSOC);

        if(move_uploaded_file($_FILES['profileimage']['tmp_name'], $path)) {
        echo "Image uploaded to database";
        }else{
            echo "There was a problem";
        }
    }
} catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
    <!DOCTYPE html>
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

                <form action="uploadimage.php" method="POST" enctype="multipart/form-data">

                    <h3 class="text-center">Upload image</h3>

                    <label for="Header">Title for image</label>
                    <br>
                    <input type="text" name="header">
                    <br>
                    <br>
                    <label for="profileimage">Choose image</label>
                    <input type="file" name="profileimage">
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