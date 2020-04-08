<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form method="post" action="<?=BASE_URL?>home/uploadPicture" enctype='multipart/form-data'>

        <div class="modal-header">
          <h5 class="modal-title">Upload</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="picupload[]" id="picupload" accept="image/*" required>
            <label class="custom-file-label" for="picupload">Choose file...</label>
          </div>

          <hr>

          <div class="card new picturecontainer" style="width: 26rem;" id="card">
            <img class="card-img-top" id="image-src" src="" alt="Brokken image!">
            <!--i class="card-img-top fas fa-image" style="font-s"></i>

            <img class="card-img-top" id="image-src" src=<?//=$viewbag[$i][2]?> alt="Card image cap"-->
            <i class="card-img-top fas fa-image" id="image-none"></i>
            <i class="card-img-top fas fa-image" id="image-error"></i>
            <p class="card-img-top image-text" id="image-text"></p>

            <div class="card-body">
              <input type="text" name="titel" maxlength="20" value="" placeholder="Give a titel...">
              <textarea name="description" maxlength="240" placeholder="Give a  Description..." style="resize: none; width: 100%; height: auto;"></textarea>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col">
                  <small class="float-left text-muted"><?=$_SESSION['username']?></small>
                </div>
                <div class="col">
                  <small class="float-right text-muted"><?=date('Y-m-d')?></small>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="submitpic" id="submitpic">Upload</button>
        </div>

      </form>

    </div>
  </div>
</div>

<script src="/Mschr18-Phans18-Mach018/mvc/public/js/upload.js"></script>
