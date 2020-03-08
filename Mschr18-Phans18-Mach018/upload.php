<?php
  include_once('header.php');
  include_once('401.php');
?>
    <section id="content">
      <h1 id="title">Upload to </h1> <?php include_once('Include/phpUtils/chalkbord.php') ?>
      <div class="upload" id="upload">

        <div class="select" id="select">
          <h4>Select a file...</h4>
          <form method="post" action="Include/PDO/uploadImages.php" enctype='multipart/form-data'>
            <input type="file" name="picupload[]"  id="picupload" multiple accept="image/*" required>
            <input type="text" name="" value="" placeholder="Titel" style="width:300px;">
            <textarea name="name" rows="8" cols="80" style="resize: none; width: 300px; height: 100px;"></textarea>
            <input type="submit" name="submitpic" id="submitpic" value="Upload">
          </form>

          <div id="preview" name="preview"></div>
        </div>
        <div class="myuploads" id="myuploads">
          <h4>My uploads.</h4>
          <?php
            $_POST["myuploads"] = true;
            include_once('include/PDO/getUploadedImages.php');
          ?>
        </div>


      </div>
    </section>

    <script src="Include/JS/upload.js"></script>
<?php
 include_once('footer.php');
?>
