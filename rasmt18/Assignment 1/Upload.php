<?php 
  session_start();
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styling.css">
    <title>Upload page</title>
</head>
<?php
        if(array_key_exists('submit', $_POST)) {
            if(isset($_FILES['img'])) {
                //$encodedImage = "data:image/" . base64_encode(file_get_contents($_FILES['img']['tmp_name']));
                //echo $encodedImage;
                //echo "<br>";
                echo "HEJ";

            }

            require_once 'db_config.php';
            try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
            $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $stmt = $conn->prepare("INSERT INTO image (header, description, username, img) VALUES(:header, :description, :username, :image)");
            $stmt->bindParam(':header', $_POST['header']);
            $stmt->bindParam(':description', $_POST['description']);
            $stmt->bindParam(':username', $_SESSION['username']);
            $stmt->bindParam(':image', base64_encode(file_get_contents($_FILES['img']['tmp_name'])));

            $stmt->execute(); 
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            $result = $stmt->fetchAll();
            echo $result;

            } 
            catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
        $conn = null;
        }
    ?>

<body>
    <div class="content" id="upload">
        <script src="./javascript/Menu.js"></script>
        <h1>Upload page</h1>
            <h2>Here you can upload your pictures</h2>
                <form method="POST" enctype = "multipart/form/data" action=>
                    <fieldset>            
                        <legend>Upload image:</legend>   
                        <label for = "header">Image title:</label>
                        <br>
                        <input type="text" name="header" placeholder="Select title" autofocus>
                        <br>
                        <label for="description">Description:</label>
                        <br>
                        <textarea id="description" name="description" rows="4" cols="50">Here you can write the description for the image.
                        </textarea>
                        <br>
                        <label for="img">Select image:</label>
                        <br>
                        <input type="file" id="img" name="img" accept="image/*">
                        <br>
                        <input type="submit" name="submit" value="Upload">
                        
                        
                    </fieldset>
            </form>
        <p>If you are having trouble uploading, please contact support.</p>
        <br>
    </div>
    
</body>
</html>
