<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  require_once('include/db_config.php');

  try {
    $stmtString = "SELECT titel, username, imagebase64, description, uploaddate, picid FROM picture";
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
        <div class="picturecontainer" id="<?=$i?>">
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
            <?php if(isset($_POST["myuploads"]) && $_POST["myuploads"]) { ?> 
                <form action="include/PDO/deleteImage.php" method="POST">
                    <input type="hidden" name="deletebtn" value="<?=$imagebase64Pics[$i][5]?>"/>
                </form>
                <a  class="deleteBtn" href="#" onclick="this.parentNode.children[1].submit()">
                    <div class="X1"></div>
                    <div class="X2"></div>
                </a>
            <?php } ?>
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