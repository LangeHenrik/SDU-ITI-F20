<?php
if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in']) ) {
  $_SESSION['page_titel'] .= " | Home";
  $_SESSION['page_header::before'] = "";
  $_SESSION['page_header::after'] = " Home.";
  $_SESSION['page_sub_header'] = "";
} else {

  $_SESSION['page_titel'] .= " | Frontpage";
  $_SESSION['page_header::before'] = "Welcome to ";
  $_SESSION['page_header::after'] = ".";
  $_SESSION['page_sub_header'] = "";
}
include_once('../app/views/partials/header.php');


if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in']) ) {
  ?>
  <div class="page container-fluid custom-container mb-2">
    <div class="container">
      My Toolboks.
      <hr>

      <a class="weatherwidget-io" href="https://forecast7.com/en/40d71n74d01/new-york/" data-label_1="ODENSE" data-label_2="WEATHER" data-theme="original" >NEW YORK WEATHER</a>
      <script>
      !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
      </script>



    </div>
  </div>
  <div class="page container-fluid custom-container mb-2 myuploads" id="myuploads">
    <div class="container">
      My uploads.
    </div>
  </div>
  <?php
  if (!empty($viewbag)) {
    for ($i=0; $i < count($viewbag); $i++) {
      ?>
      <div class="card picturecontainer" style="width: 14rem;" id="card_<?=$i?>">
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
        <form action="<?=BASE_URL?>picture/deletePicture" method="POST">
          <input type="hidden" name="deletebtn" value="<?=$viewbag[$i][5]?>"/>
        </form>
        <a  class="deleteBtn" href="#" onclick="this.previousSibling.previousSibling.submit()">
          <div class="X1"></div>
          <div class="X2"></div>
        </a>
        <script src="/Mschr18-Phans18-Mach018/mvc/public/js/home.js"></script>
      </div>
      <?php
    }
  }
  ?>
</div>

<?php
} else {
  ?>

  <div class="page container-fluid custom-container">
    <div id="carouselContent" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselContent" data-slide-to="0" class="active"></li>
        <li data-target="#carouselContent" data-slide-to="1"></li>
        <li data-target="#carouselContent" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active text-center p-4">
          <h1><i class="fas fa-user-friends fa-xs"></i></h1>
          <h4>Connect with you friends.</h4>
          <p>Share moments and stories on ChalkB<i class='fas fa-chalkboard'></i>rd <br>with family, friends, and the world </p>
        </div>
        <div class="carousel-item text-center p-4">
          <h1><i class="fas fa-image fa-xs"></i></h1>
          <h4>Post images.</h4>
          <p>Upload images to ChalkB<i class='fas fa-chalkboard'></i>rd <br>And tell your story with a titel and a comment. </p>
        </div>
        <div class="carousel-item text-center p-4">
          <h1><i class="fas fa-comments fa-xs"></i></h1>
          <h4>Comments.</h4>
          <p>Soon to come on ChalkB<i class='fas fa-chalkboard'></i>rd <br>Add comments to others users images. </p>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="container">
      <hr>
      <h2 class="center">Get started today <a href="<?=BASE_URL?>user/signup">sign up <i class="fas fa-user-plus fa-s"></i></a></h2>
      <br>
      <h2 class="center">Already a member. </h2>
      <br>
      <div class="container">
        <?php
        include('../app/views/partials/logInForm.php');
        ?>
      </div>
    </div>
  </div>

  <?php
}

include_once('../app/views/partials/footer.php');
?>
