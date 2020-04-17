<?php include '../app/views/partials/menu.php'; ?>

<?php

print_r($viewbag);

print_r("whaaaaat");

print_r($viewbag[0]['image_blob']);

print_r("whaaaaat");

?>

<img src=<?=$viewbag[0]['image_blob']?> >

<?php
if (!empty($viewbag)) {
    for ($i=0; $i < count($viewbag); $i++) {
      ?>

      <div class="card picturecontainer" style="width: 18rem;" id="<?=$viewbag[$i]['image_header']?>">
        <img class="card-img-top" src=<?=$viewbag[$i]['image_blob']?> alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?=$viewbag[$i]['image_header']?></h5>
          <p class="card-text"><?=$viewbag[$i]['image_description']?></p>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col">
              <small class="float-left text-muted"><?=$viewbag[$i]['image_id']?></small>
            </div>
            <div class="col">
              <small class="float-right text-muted"><?=$viewbag[$i]['image_owner']?></small>
            </div>
          </div>
        </div>
      </div>
      
      <?php
    }
}

  ?>

<?php include '../app/views/partials/foot.php'; ?>