<?php 
  session_start();
?>
<html>
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styling.css">
    <title>Upload page</title>
</head>
   <body>
   <div class="content" id="upload">
        <script src="./javascript/Menu.js"></script>
        <h1>Upload page</h1>
            <h2>Here you can upload your pictures</h2>
               <form action="" method ="POST" enctype = "multipart/form-data">
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
                     <label for="image">Select image:</label>
                     <br>
                  <input type = "file" name = "image" />
                  <input type = "submit" value="Submit" name="submit"/>
                  </fieldset>
            </form>
        <p>If you are having trouble uploading, please contact support.</p>
        <br>
      </form>
      <?php
        if(array_key_exists('submit', $_POST)) {
        require_once 'db_config.php';
                try {
                $convertedImg = "data:".$_FILES['image']['type'].";base64,".base64_encode(file_get_contents($_FILES['image']['tmp_name']));
                
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
                $password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $stmt = $conn->prepare("INSERT INTO image (header, description, username, img) VALUES(:header, :description, :username, :image)");
                
                $tempHeader = filter_var($_POST['header'], FILTER_SANITIZE_STRING);
                $tempHeaderXSS = htmlspecialchars($tempHeader);
                $stmt->bindParam(':header', $tempHeaderXSS, PDO::PARAM_STR);

                $tempDescription = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
                $tempDescriptionXSS = htmlentities($tempDescription);
                $stmt->bindParam(':description', $tempDescriptionXSS, PDO::PARAM_STR);

                $tempUsername = filter_var($_SESSION['username'], FILTER_SANITIZE_STRING);
                $tempUsernameXSS = htmlspecialchars($tempUsername);
                $stmt->bindParam(':username', $tempUsernameXSS, PDO::PARAM_STR);
                
                $stmt->bindParam(':image', $convertedImg, PDO::PARAM_STR);

                $stmt->execute(); 
                $stmt->setFetchMode(PDO::FETCH_ASSOC); 

                } 
                catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                }
        $conn = null;
        }
    ?>
   </body>
</html> 
