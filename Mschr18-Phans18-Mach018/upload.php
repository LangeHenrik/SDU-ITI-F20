<?php
  include_once('header.php');
  include_once('authendicate.php');
?>
    <section id="content">
        <div class="upload" id="upload">
          <h1 id="title">Upload at </h1> <?php include_once('Include/chalkbord.php') ?>
              <form method="post" enctype="multipart/form-data">
                <label for="picupload">Select a file:</label><br>
                <input type="file" name="picupload"  id="picupload" accept="image/*">
                <input type="submit" name="submitpic" id="submitpic" value="Upload">
              </form>
              <img src="" alt="" id="uploadedImage" height="80%" hidden=true>
        </div>
    </section>

    <script src="Include/upload.js"></script>
<?php
 include_once('footer.php');
?>
