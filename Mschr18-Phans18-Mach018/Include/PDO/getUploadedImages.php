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

    if (isset($_POST["myuploads"]) && $_POST["myuploads"]) {
      $stmt = $conn->prepare("SELECT titel, imagebase64, description, uploaddate FROM picture WHERE username = :username");
      $stmt->bindParam(':username', $_SESSION['username']);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_NUM);
      $imagebase64Pics = $stmt->fetchAll();
      for ($i=0; !empty($imagebase64Pics) && $i < count($imagebase64Pics); $i++)
      {
        ?>
          <div class="picturecontainer">
            <p class="titel"><?php echo "Titel: " . $imagebase64Pics[$i][0] ?></p>
            <p class="byuser"><?php echo "By: " . $_SESSION['username'] ?></p>
            <img src= <?php echo $imagebase64Pics[$i][1] ?> alt= <?php echo $_SESSION['username'] . ":". $imagebase64Pics[$i][0] ?> >
            <p class="descripton"><?php echo "Descripton: <br>" . $imagebase64Pics[$i][3] ?></p>
            <p class="date"><?php echo "Date: " . $imagebase64Pics[$i][3] ?></p>
          </div>
        <?php
      }
    } else {
      $stmtString = "SELECT titel, username, imagebase64, description, uploaddate FROM picture";
      $stmt = $conn->prepare($stmtString);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_NUM);
      $imagebase64Pics = $stmt->fetchAll();
      for ($i=0; !empty($imagebase64Pics) && $i < count($imagebase64Pics); $i++)
      {
        ?>
          <div class="picturecontainer">
            <p class="titel"><?php echo "Titel: " . $imagebase64Pics[$i][0] ?></p>
            <p class="byuser"><?php echo "By: " . $imagebase64Pics[$i][1] ?></p>
            <img src= <?php echo $imagebase64Pics[$i][2] ?> alt= <?php echo $imagebase64Pics[$i][1] . ":". $imagebase64Pics[$i][0] ?> >
            <p class="descripton"><?php echo "Descripton: <br>" . $imagebase64Pics[$i][3] ?></p>
            <p class="date"><?php echo "Date: " . $imagebase64Pics[$i][4] ?></p>
          </div>
        <?php
      }
    }
  }
  catch(PDOException $e)
  {
    echo "<br>Connection failed: " . $e->getMessage() . ".\n code " . $e->getCode();
  }
  $conn = NULL;
?>
