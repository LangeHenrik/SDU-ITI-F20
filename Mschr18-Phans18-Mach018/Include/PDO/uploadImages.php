<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  require_once('../db_config.php');

  try
  {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*$stmt = $conn->prepare("SELECT userid FROM users WHERE username = :username");
    $stmt->bindParam(':username', $_SESSION["username"]);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_NUM);
    $userid = $stmt->fetchAll()[0][0];*/

    for ($i=0; $i < count($_FILES["picupload"]["name"]); $i++)
    {
      // Is the file too big or has other errors?
      if ($_FILES["picupload"]["error"][$i] != 0) {
        continue;
      }

      $name = $_FILES['picupload']['name'][$i];
      $target_dir = "../Images/";
      $target_file = $target_dir . basename($_FILES["picupload"]["name"][$i]);

      // Find filtype
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Check endelse
      if( getimagesize($_FILES["picupload"]["tmp_name"][$i]) !== false )
      {
        // Konverter til base64
        $image_base64 = base64_encode(file_get_contents($_FILES['picupload']['tmp_name'][$i]) );
        $image_base64 = 'data:image/'.$imageFileType.';base64,'.$image_base64;

        // Indsæt billede med id, dato, path og base64 string.
        $stmt = $conn->prepare("INSERT INTO picture (username, titel, description, uploaddate, imagename, imagebase64)
                              VALUES(:username, :titel, :description, NOW(), :imagename, :imagebase64)");
        $stmt->bindParam(':username', $_SESSION["username"]);
        $stmt->bindParam(':titel', $_POST["titel"]);                       // Vi bør sanitize her.
        $stmt->bindParam(':description', $_POST["description"]);           // Vi bør sanitize her.
        $stmt->bindParam(':imagename', $name);
        $stmt->bindParam(':imagebase64', $image_base64);
        $stmt->execute();

        // Upload file
        move_uploaded_file($_FILES['picupload']['tmp_name'][$i],$target_dir.$name);
      }
      else
      {
        echo "<script> console.log('File(s) were not of correct type'); </script>" ;
      }
    }
    header('location:../../upload.php');
  }
  catch(PDOException $e)
  {
      echo "<br>Connection failed: " . $e->getMessage() . ".\n code " . $e->getCode();
  }
  $conn = NULL;
?>
