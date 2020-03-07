<?php
  include_once('header.php');
  include_once('authendicate.php');
?>
    <section id="content">
        <div class="upload" id="upload">
          <h1 id="title">Upload at </h1> <?php include_once('Include/chalkbord.php') ?>
              <form method="post" action="uploadImages.php" enctype='multipart/form-data'>
                <label for="picupload" style="margin: 5px;">Select a file:</label><br>
                <input type="file" name="picupload[]"  id="picupload" multiple accept="image/*" required>
                <input type="submit" name="submitpic" id="submitpic" value="Upload">
                <label style="margin-right: 20px; float: right">My Images</label>
              </form>
              <div>
                  <div id="imgUploadContain" name="imgUploadContain" style="width: 49.4%; overflow: auto; 
                  display: inline-block; height: 80%; border: grey dashed 5px;"></div>
                  <div id="imgContain" name="imgContain" style="width: 49.4%; overflow: auto; float: right;
                  display: inline-block; height: 80%; border: grey dashed 5px; margin-left: -20px;">
                    <?php 
                      include_once('include/uploadRetrieveImgs.php');
                    ?>
                  </div>
              </div>
        </div>
    </section>

    <script src="Include/upload.js"></script>
<?php
 include_once('footer.php');
?>
