<?php
  $_SESSION['page_titel'] .= " | Feed";
  $_SESSION['page_header::before'] = "";
  $_SESSION['page_header::after'] = " Feed.";
  $_SESSION['page_sub_header'] = "Follow image feed for updates whenever new stories are uploaded.";

  include_once('../app/views/partials/header.php');

  if (!empty($viewbag)) {
    for ($i=0; $i < count($viewbag); $i++) {
      ?>

      <div class="card picturecontainer" style="width: 18rem;" id="<?=$viewbag[$i][5]?>">
        <img class="card-img-top" src=<?=$viewbag[$i][2]?> alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?=$viewbag[$i][0]?></h5>
          <p class="card-text"><?=$viewbag[$i][3]?></p>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col">
              <small class="float-left text-muted"><?=$viewbag[$i][1]?></small>
            </div>
            <div class="col">
              <small class="float-right text-muted"><?=$viewbag[$i][4]?></small>
            </div>
          </div>
        </div>
      </div>
      
      <?php
    }
  }

 include_once('../app/views/partials/footer.php');
?>
