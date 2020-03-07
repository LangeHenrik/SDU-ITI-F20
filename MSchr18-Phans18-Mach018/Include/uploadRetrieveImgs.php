<?php
  require_once('include/db_config.php');

  try
  {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Find userid tilsvarende username 
    $stmt = $conn->prepare("SELECT userid FROM users WHERE username = :username");
    $stmt->bindParam(':username', $_SESSION["username"]);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_NUM); 
    $userid = $stmt->fetchAll()[0][0];

    // Hent imagebase64 uploaded af user
    $stmt = $conn->prepare("SELECT imagebase64, uploaddate, imagename FROM picture WHERE userid = :userid");
    $stmt->bindParam(':userid', $userid);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_NUM); 
    $imagebase64Pics = $stmt->fetchAll();

    for ($i=0; !empty($imagebase64Pics) && $i < count($imagebase64Pics); $i++) 
    { 
      echo "<div style=\"width: 98.5%; height: 40%; margin: 5 5 5 5; background-color: grey; display: block;\">";
        echo "<img src=\"" . $imagebase64Pics[$i][0] . "\" alt=\"MyPicture $i\" style=\"max-height: 100%; max-width:50%; margin: aito 0; display: inline;\">";
        echo "<div style=\"margin: auto; display: inline; float: right;\">";
          echo "<p style=\"margin-right: 10px;\">Name: " . $imagebase64Pics[$i][2] . "</p>";
          echo "<p style=\"margin-right: 10px;\">Upload Date: " . $imagebase64Pics[$i][1] . "</p>";
        echo "</div>";  
      echo "</div>";  
    }

  }
  catch(PDOException $e)
  {
    echo "<br>Connection failed: " . $e->getMessage() . ".\n code " . $e->getCode();
  }
  $conn = NULL;
?>