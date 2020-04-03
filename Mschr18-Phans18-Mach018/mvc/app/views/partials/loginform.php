<form class="form-inline my-2 my-lg-0" method="post" action="Include/phpUtils/login.php" >
  <label class="sr-only" for="usernameInput">Username</label>
  <div class="input-group mr-sm-2">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
    </div>
    <input type="text" id="usernameInput" placeholder="Username" name="username" >
  </div>
  <label class="sr-only" for="passwordInput">Passwor</label>
  <div class="input-group mr-sm-2">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
    </div>
    <input type="password" id="passwordInput" placeholder="Password" name="password" >
  </div>
<!--
  <label for="username">Username</label>
  <input type="text" name="username" tabindex="8" />
  <label for="password">Password</label>
  <input type="password" name="password" tabindex="9" />
-->
  <button type="submit" name="submit" class="btn btn-light btn-sm">Log In</button>
</form>
