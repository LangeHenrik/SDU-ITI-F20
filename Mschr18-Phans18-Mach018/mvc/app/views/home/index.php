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

<div class="row">
   <div class="col-sm">
    <div class="container">
      <div class="myuploads" id="myuploads">
        <h4>My uploads.</h4>
        <?php
          if (!empty($viewbag)) {
            for ($i=0; $i < count($viewbag); $i++) {
              ?>
                <div class="picturecontainer" id="<?=$i?>">
                    <table>
                        <tr>
                            <td class="titel" width="200">Titel: <?=$viewbag[$i][0]?></td>
                            <td class="byuser" width="240">By: <?=$viewbag[$i][1]?></td>
                        </tr>
                        <tr>
                            <td height="170">
                                <img src= <?=$viewbag[$i][2]?> alt="Picture by <?=$viewbag[$i][1]?>, titeled <?=$viewbag[$i][0]?>" >
                            </td>
                            <td class="descripton">Descripton:<br><?=$viewbag[$i][3]?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="date">Date: <?=$viewbag[$i][4]?></td>
                        </tr>
                    </table>
                      <form action="include/PDO/deleteImage.php" method="POST">
                          <input type="hidden" name="deletebtn" value="<?=$viewbag[$i][5]?>"/>
                      </form>
                      <a  class="deleteBtn" href="#" onclick="this.parentNode.children[1].submit()">
                          <div class="X1"></div>
                          <div class="X2"></div>
                      </a>
                </div>
              <?php
            }
          }
        ?>
      </div>
    </div>
   </div>
   <div class="col-sm">
     <div class="page container-fluid custom-container">
       <div class="container">
      api stuffe like wther
        </div>
     </div>
   </div>
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
      <h2 class="center">Get started today <a href="<?=BASE_URL?>Home/signup">sign up <i class="fas fa-user-plus fa-s"></i></a></h2>
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
