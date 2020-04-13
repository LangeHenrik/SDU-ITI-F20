<form class="form-group custom-nav-collapse-show" method="post" action="<?=BASE_URL?>user/login" >
  <div class="input-group input-group-sm mr-2">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
    </div>
    <input type="text" class="form-control" id="usernameInput" placeholder="Username" name="username" >
  </div>
  <!--label class="sr-only" for="passwordInput">Passwor</label-->
  <div class="input-group input-group-sm mr-2">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
    </div>
    <input type="password" class="form-control" id="passwordInput" placeholder="Password" name="password" >
  </div>
  <div class="text-right">
    <div class="btn-group btn-group-sm ">
      <button type="submit" name="Log in" class="btn btn-light ">Log in</button>
    </div>
  </div>
</form>
