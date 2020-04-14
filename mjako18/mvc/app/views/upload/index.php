<?php include '../app/views/partials/menu.php'; ?>
<section>
  <div class="container-fluid fixed-nav">
      <div class="col-xl-4 col-m-4" id="upload">
        <div id="upload_response"></div>
        <div>
          <form id="uploadForm" action="upload/saveImage" method="post" enctype="multipart/form-data">
            <fieldset>
              <legend>Image upload</legend>
              <div>
                <input type="text" name="caption" id="caption" placeholder="Write caption">
              </div>
              <div>
                <textarea name="description" id="description" placeholder="Write description"></textarea>
              </div>
              <div>
                <input type="file" name="image" id="image" placeholder="Find image" oninput="validateImage(this.form);">
              </div>
              <div>
                <button type="button" name="" id="" form="uploadForm" onclick="postUpload(this.form);">Upload image</button>
              </div>
            </fieldset>
          </form>
          <div><progress id="fileUploadProgress" min="0" max="100" value="0">0% complete</progress></div>
        </div>
      </div>
      <div class="col-xl-4 col-m-4"><img id="preview" alt=""/><div class="hidden" id="fileInfo"></div></div>
    <div class="col-xl-4 col-m-4">
    <?php include '../app/views/partials/logoutform.php'; ?>
    </div>
  </div>
</section>

<script type="text/javascript" src="js/upload.js"></script>
<?php include '../app/views/partials/foot.php'; ?>
