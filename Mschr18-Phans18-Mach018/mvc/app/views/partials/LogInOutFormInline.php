<?php if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in']) ) { ?>

    <form class="form-inline" method="post" action="<?=BASE_URL?>user/logout" >
      <div class="input-group input-group-sm mr-2">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <div class="input-group-append">
          <span class="input-group-text"><b id="userid"><?=($_SESSION['fullname'] . " : " . $_SESSION['username'])?></b></i></span>
        </div>
      </div>

      <div class="btn-group btn-group-sm mr-2">
        <button type="submit" name="logout" class="btn-sm btn-light ">Log out</button>
      </div>
    </form>

<?php } else { ?>

    <form class="form-inline" method="post" action="<?=BASE_URL?>user/login" >
      <div class="input-group input-group-sm mr-2">
        <div class="input-group-prepend">
          <span class="input-group-text" ><i class="fas fa-user"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Username" name="username" >
      </div>

      <div class="input-group input-group-sm mr-2">
        <div class="input-group-prepend">
          <span class="input-group-text" ><i class="fas fa-key"></i></span>
        </div>
        <input type="password" class="form-control" placeholder="Password" name="password" >
      </div>

      <div class="btn-group btn-group-sm mr-2">
        <button type="submit" name="Log in" class="btn btn-light">Log in</button>
      </div>
    </form>


<?php } ?>
