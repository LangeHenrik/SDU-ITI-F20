<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  require_once('include/db_config.php');

  try
  {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT userid FROM users WHERE username = :username");
    $stmt->bindParam(':username', $_SESSION["username"]);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_NUM); 
    $userid = $stmt->fetchAll()[0][0];

    for ($i=0; $i < count($_FILES["picupload"]["name"]); $i++) 
    { 
      $name = $_FILES['picupload']['name'][$i];
      $target_dir = "include/images/";
      $target_file = $target_dir . basename($_FILES["picupload"]["name"][$i]);
      
      // Find filtype
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      
      // Check endelse
      if( getimagesize($_FILES["picupload"]["tmp_name"][$i]) !== false ) 
      {
        // Konverter til base64 
        $image_base64 = base64_encode(file_get_contents($_FILES['picupload']['tmp_name'][$i]) );
        $image_base64 = 'data:include/images/'.$imageFileType.';base64,'.$image_base64;
        
        // Indsæt billede med id, dato, path og base64 string.
        $stmt = $conn->prepare("INSERT INTO picture (userid, uploaddate, imagename, imagebase64) 
                              VALUES(:userid, NOW(), :imagename, :imagebase64)");
        $stmt->bindParam(':userid', $userid);
        $stmt->bindParam(':imagename', $name);
        $stmt->bindParam(':imagebase64', $image_base64);
        $stmt->execute();
        
        // Upload file
        move_uploaded_file($_FILES['picupload']['tmp_name'][$i],$target_dir.$name);
      }
      else 
      {
        echo "<script> console.log('File(s) vere not of correct type'); </script>" ;
      }
    }
    require('upload.php');
  }
  catch(PDOException $e)
  {
      echo "<br>Connection failed: " . $e->getMessage() . ".\n code " . $e->getCode();
  }
  $conn = NULL;
?>
