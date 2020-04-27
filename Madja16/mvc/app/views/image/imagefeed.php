<?php include '../app/views/partials/menu.php'; ?>

<?php
if (!empty($viewbag)) {
    for ($i=0; $i < count($viewbag); $i++) {
      ?>

      <div class="card picturecontainer" style="width: 27rem;">
        <img class="card-img-top" src=<?=$viewbag[$i]['image']?> alt="Image could not be loaded">
        <div class="card-body">
          <h5 class="card-title"><?=$viewbag[$i]['title']?></h5>
          <p class="card-text"><?=$viewbag[$i]['description']?></p>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col">
              <small class="float-left text-muted"><?="ImageID: " . $viewbag[$i]['image_id']?></small>
            </div>
            <div class="col">
              <small class="float-right text-muted"><?="UserID: " . $viewbag[$i]['image_owner']?></small>
            </div>
          </div>
        </div>
      </div>
      
      <?php
    }
}
else {
  echo "No images found in the viewbag";
}
  ?>

<?php include '../app/views/partials/foot.php'; ?>