<form class="form-inline mx-auto " style="width: 310; margin-bottom: 0;" method="post" action="<?=BASE_URL?>Home/logout" >
  <div class="input-group input-group-sm mr-2">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="fas fa-user"></i></span>
    </div>
    <div class="input-group-append">
      <span class="input-group-text"><b><?php echo $_SESSION['Fullname'] . " : " . $_SESSION['username']?></b></i></span>
    </div>
  </div>

  <div class="btn-group btn-group-sm">
    <button type="submit" name="logout" class="btn-sm btn-light ">Log out</button>
  </div>
</form>
