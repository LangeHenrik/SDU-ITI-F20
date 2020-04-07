<?php
  include_once('../app/views/partials/header.php');
?>
    <section id="content">
      <h1 id="title">Upload to </h1> <?php include('../app/views/partials/chalkbordlogo.php') ?>
      <div class="upload" id="upload">

        <div class="select" id="select">
          <h4>Select a file...</h4>
          <form method="post" action="<?=BASE_URL?>home/uploadPicture" enctype='multipart/form-data'>
            <input type="file" name="picupload[]" id="picupload" multiple accept="image/*" required>
            <input type="text" name="titel" maxlength="20" value="" placeholder="Titel" style="width:300px;">
            <textarea name="description" maxlength="240" placeholder="Description" style="resize: none; width: 300px; height: 100px;"></textarea>
            <input type="submit" name="submitpic" id="submitpic" value="Upload">
          </form>

          <div id="preview" name="preview"></div>
        </div>
        <div class="myuploads" id="myuploads">
          <h4>My uploads.</h4>
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
                                  <img src= <?=$viewbag[$i][2]?> alt="Picture by <?=$viewbag[$i][1]?>, titeled <?=$viewbag[$i][0]?>" >
                              </td>
                              <td class="descripton">Descripton:<br><?=$viewbag[$i][3]?></td>
                          </tr>
                          <tr>
                              <td></td>
                              <td class="date">Date: <?=$viewbag[$i][4]?></td>
                          </tr>
                      </table> 
                        <form action="include/PDO/deleteImage.php" method="POST">
                            <input type="hidden" name="deletebtn" value="<?=$viewbag[$i][5]?>"/>
                        </form>
                        <a  class="deleteBtn" href="#" onclick="this.parentNode.children[1].submit()">
                            <div class="X1"></div>
                            <div class="X2"></div>
                        </a>
                  </div>
                <?php
              }
            }
          ?>
        </div>


      </div>
    </section>

    <script src="js/upload.js"></script>
<?php
 include_once('../app/views/partials/footer.php');
?>
