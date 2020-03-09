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
      $stmt = $conn->prepare("SELECT imagebase64, imagename, uploaddate FROM picture WHERE username = :username");
      $stmt->bindParam(':username', $_SESSION['username']);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_NUM);
      $imagebase64Pics = $stmt->fetchAll();
      for ($i=0; !empty($imagebase64Pics) && $i < count($imagebase64Pics); $i++)
      {
        ?>
          <div class="picturecontainer">
            <img src= <?php echo $imagebase64Pics[$i][0] ?> alt= <?php echo " MyPicture " . $imagebase64Pics[$i][1] ?> >
            <table class="info">
              <tr>
                <th>Name:</th> <td><?php echo $imagebase64Pics[$i][1] ?></td>
              </tr>
              <tr>
                <th>Upload Date:</th> <td><?php echo $imagebase64Pics[$i][2] ?></td>
              </tr>
            </table>
          </div>
        <?php
      }
    } else {
      $stmtString = "SELECT imagebase64, username, imagename, uploaddate FROM picture";
      $stmt = $conn->prepare($stmtString);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_NUM);
      $imagebase64Pics = $stmt->fetchAll();
      for ($i=0; !empty($imagebase64Pics) && $i < count($imagebase64Pics); $i++)
      {
        ?>
          <div class="picturecontainer">
            <img src= <?php echo $imagebase64Pics[$i][0] ?> alt= <?php echo " MyPicture " . $imagebase64Pics[$i][2] ?> >
            <table class="info">
              <tr>
                <th>Upload by:</th> <td><?php echo $imagebase64Pics[$i][1] ?></td>
              </tr>
              <tr>
                <th>Name:</th> <td><?php echo $imagebase64Pics[$i][2] ?></td>
              </tr>
              <tr>
                <th>Upload Date:</th> <td><?php echo $imagebase64Pics[$i][3] ?></td>
              </tr>
            </table>
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
