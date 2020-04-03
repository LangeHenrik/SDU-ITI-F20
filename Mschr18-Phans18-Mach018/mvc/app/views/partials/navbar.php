<nav class="navbar navbar-expand-lg navbar-light sticky-top">
  <a class="navbar-brand" href="Home">
    <?php include('../app/views/partials/chalkbordlogo.php') ?>
  </a>


  <div class="btn-group">
    <?php if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in']) ) { ?>

      <div class=" custom-nav-collapse">
        <form class="form-inline my-2 my-lg-0" method="post" action="Include/phpUtils/logout.php" >
          <div class="input-group input-group-sm">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><b><?php echo $_SESSION['Fullname'] . " : " . $_SESSION['username']?></b></i></span>
            </div>
            <button type="submit" name="logout" class="btn-sm btn-light ">Log out</button>
          </div>
        </form>
      </div>

    <?php } else { ?>

      <div class=" custom-nav-collapse">
        <form class="form-inline my-2 my-lg-0" method="post" action="Include/phpUtils/login.php" >
          <?php
          include('loginFormContent.php');
          ?>
        </form>
      </div>

    <?php } ?>

    <button class="navbar-toggler btn-sm" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav " >
      <li class="nav-item">
        <a class="nav-link" href="Home">Home <i class="fas fa-home"></i></a>
      </li>

      <?php if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in']) ) { ?>

          <li class="nav-item">
            <a class="nav-link"  href="ChalkBoard-Feed">ChalkBoard-Feed <i class="fas fa-comment-alt"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="Upload">Upload <i class="fas fa-file-upload"></i></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="Users">Users <i class="fas fa-address-book"></i></i></a>
          </li>

      <?php } else { ?>

        <li class="nav-item">
          <a class="nav-link"  href="Registration">Sign up <i class="fas fa-user-plus"></i></a>
        </li>

      <?php } ?>

    </ul>
  </div>
  <div class="collapse navbar-collapse justify-content-end">


  <?php if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in']) ) { ?>

      <form class="form-inline my-2 my-lg-0" method="post" action="Include/phpUtils/logout.php" >
        <div class="input-group input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><b><?php echo $_SESSION['Fullname'] . " : " . $_SESSION['username']?></b></i></span>
          </div>
          <button type="submit" name="logout" class="btn-sm btn-light ">Log out</button>
        </div>
      </form>

  <?php } else { ?>

      <form class="form-inline my-2 my-lg-0" method="post" action="Include/phpUtils/login.php" >
        <?php
        include('loginFormContent.php');
        ?>
      </form>

  <?php } ?>
  </div>
</nav>
