<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="<?=BASE_URL?>home/Index">
    <?php include('../app/views/partials/chalkbordlogo.php') ?>
  </a>


  <div class="btn-group">
    <div class=" custom-nav-collapse">
      <?php
        include('logInOutFormInline.php');
      ?>
    </div>

    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav " >
      <li class="nav-item">
        <a class="nav-link" href="<?=BASE_URL?>home/index">Home <i class="fas fa-home"></i></a>
      </li>

      <?php if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in']) ) { ?>

          <li class="nav-item">
            <a class="nav-link"  href="<?=BASE_URL?>home/feed">
              ChalkBoard-Feed <i class="fas fa-comment-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#modalUpload">
              Upload <i class="fas fa-file-upload"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="<?=BASE_URL?>home/users">
              Users <i class="fas fa-address-book"></i>
            </a>
          </li>

      <?php } else { ?>

        <li class="nav-item">
          <a class="nav-link"  href="<?=BASE_URL?>home/signup">Sign up <i class="fas fa-user-plus"></i></a>
        </li>

      <?php } ?>

    </ul>
  </div>
  <div class="collapse navbar-collapse justify-content-end">
    <?php
      include('logInOutFormInline.php');
    ?>
  </div>
</nav>
