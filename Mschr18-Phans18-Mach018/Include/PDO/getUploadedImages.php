<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  require_once('include/db_config.php');

  try {
    $stmtString = "SELECT titel, username, imagebase64, description, uploaddate FROM picture";
    if (isset($_POST["myuploads"]) && $_POST["myuploads"]) {
      $stmt = $conn->prepare($stmtString . " WHERE username = :username");
      $stmt->bindParam(':username', $_SESSION['username']);
    } else {
      $stmt = $conn->prepare($stmtString);
    }
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_NUM);
    $imagebase64Pics = $stmt->fetchAll();
    for ($i=0; !empty($imagebase64Pics) && $i < count($imagebase64Pics); $i++)
    {
      ?>
        <div class="picturecontainer">
          <table>
            <tr>
              <td class="titel">Titel: <?=$imagebase64Pics[$i][0]?></td>
              <td class="byuser">By: <?=$imagebase64Pics[$i][1]?></td>
            </tr>
            <tr>
              <td>
                <img src= <?=$imagebase64Pics[$i][2]?> alt="<?=$imagebase64Pics[$i][1]?> : <?=$imagebase64Pics[$i][0]?>" >
              </td>
              <td class="descripton">Descripton: <br><?=$imagebase64Pics[$i][3]?></td>
            </tr>
            <tr>
              <td></td>
              <td class="date">Date: <?=$imagebase64Pics[$i][4]?></td>
            </tr>
          </table>
        </div>
      <?php
    }
  }
  catch(PDOException $e)
  { ?>
    <br>Connection failed: <?=$e->getMessage()?><br/>code <?=$e->getCode()?>
  <?php }
  $conn = NULL;
?>