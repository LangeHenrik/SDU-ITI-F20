<?php
  include_once('../app/views/partials/header.php');
?>
<div class="page upload container-fluid custom-container">
  <div class="container">

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


      </div>
    <script src="/Mschr18-Phans18-Mach018/mvc/public/js/upload.js"></script>
</div>
<?php
 include_once('../app/views/partials/footer.php');
?>
