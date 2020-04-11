<div class="modal comment fade" id="modalCommentImage" tabindex="-1" role="dialog" aria-labelledby="modalCommentImage" aria-hidden="true">
  <div class="row modal-image-comment h-100">
    <div class="col-md-6 col-card my-auto" >


      <div class="modal-dialog" role="document">


        <div class="card" style="width: 18rem;">
          <img class="card-img-top" id="commentImg" src="" alt="Brokken image!">
          <div class="card-body">
            <h5 class="card-title" id="commentImgTitle"></h5>
            <p class="card-text" id="commentImgDescription"></p>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col">
                <small class="float-left text-muted" id="commentImgAuther"></small>
              </div>
              <div class="col">
                <small class="float-right text-muted" id="commentImgDate"></small>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
    <div class="col-md-6 col-comment">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Comment image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body "> <!-- removed "comment" from class -->

          <!-- Messages that go here are from https://bootsnipp.com/snippets/4MGa2 -->

        </div>
        <div class="modal-footer footer-comment col-md-11">
            <!-- Comment post form -->
            <textarea class="form-control col-md" id="inputComment" rows="3"></textarea>
            <input type="hidden" id="inputPicid">
            <button type="submit" id="commentPost" class="btn btn-primary col-md-2">Post</button>
        </div>

    </div>
  </div>

</div>
