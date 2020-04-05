<?php
  include_once('../app/views/partials/header.php');
  //include_once('401.php');
?>
    <section id="content">
      <h1 id="title">Feed </h1> <?php include_once('../app/views/partials/chalkbordlogo.php') ?>
      <div class="feed" id="feed">
        <?php
        if (!empty($viewbag)) {
          for ($i=0; $i < count($viewbag); $i++) {
            ?>
              <div class="picturecontainer" id="<?=$i?>">
                  <table>
                      <tr>
                          <td class="titel" width="200">Titel: <?=$viewbag[$i][0]?></td>
                          <td class="byuser" width="240">By: <?=$viewbag[$i][1]?></td>
                      </tr>
                      <tr>
                          <td height="170">
                              <img src= <?=$viewbag[$i][2]?> alt="<?=$viewbag[$i][1]?> : <?=$viewbag[$i][0]?>" >
                          </td>
                          <td class="descripton">Descripton:<br><?=$viewbag[$i][3]?></td>
                      </tr>
                      <tr>
                          <td></td>
                          <td class="date">Date: <?=$viewbag[$i][4]?></td>
                      </tr>
                  </table> 
                  <?php if(isset($_POST["myuploads"]) && $_POST["myuploads"]) { ?> 
                      <form action="include/PDO/deleteImage.php" method="POST">
                          <input type="hidden" name="deletebtn" value="<?=$viewbag[$i][5]?>"/>
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
        ?>
        
      </div>
    </section>

<?php
 include_once('../app/views/partials/footer.php');
?>
