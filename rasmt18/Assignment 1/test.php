<html>
   <body>
      
      <form action = "" method = "POST" enctype = "multipart/form-data">
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
         <input type = "submit"/>
			
         <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
            <li>File name: <?php echo $_FILES['image']['tmp_name'] ?>
            <li>File encoded: <?php echo "data:".$_FILES['image']['type'].";base64,".base64_encode(file_get_contents($_FILES['image']['tmp_name']));
 ?>
            <?php echo "<img src=data:".$_FILES['image']['type'].";base64,".base64_encode(file_get_contents($_FILES['image']['tmp_name']))."></img>"?>

            
         </ul>
			
      </form>
      <?php
      
         require_once 'db_config.php';
            try {
               $convertedImg = "data:".$_FILES['image']['type'].";base64,".base64_encode(file_get_contents($_FILES['image']['tmp_name']));
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
            $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $stmt = $conn->prepare("INSERT INTO image (header, description, username, img) VALUES(:header, :description, :username, :image)");
            $stmt->bindParam(':header', $_POST['header']);
            $stmt->bindParam(':description', $_POST['description']);
            $stmt->bindParam(':username', $_POST['description']);
            $stmt->bindParam(':image', $convertedImg);

            $stmt->execute(); 
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            $result = $stmt->fetchAll();
            echo $result;

            } 
            catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
      $conn = null;
    ?>
   </body>
</html> 
