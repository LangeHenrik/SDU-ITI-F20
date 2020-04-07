<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">

              <div class="select" id="select">
                <h4>Select a file...</h4>
                <form method="post" action="<?=BASE_URL?>home/uploadPicture" enctype='multipart/form-data'>
                  <input type="file" name="picupload[]" id="picupload" multiple accept="image/*" required>
                  <input type="text" name="titel" maxlength="20" value="" placeholder="Titel" style="width:300px;">
                  <textarea name="description" maxlength="240" placeholder="Description" style="resize: none; width: 300px; height: 100px;"></textarea>
                  <input type="submit" name="submitpic" id="submitpic" value="Upload">
                </form>

                <div id="preview" name="preview">
                </div>
              </div>


            </div>
          <script src="/Mschr18-Phans18-Mach018/mvc/public/js/upload.js"></script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
