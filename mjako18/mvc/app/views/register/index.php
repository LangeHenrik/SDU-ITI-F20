<?php include '../app/views/partials/menu.php'; ?>
<section>
  <div class="container-fluid fixed-nav">
    <div class="col-xl-8 col-m-8">
      <div>
        <form action="register/register_account" method="post" id="registerform">
          <fieldset>
            <legend>Register user</legend>
            <div>
              <label for="username">Username:</label>
              <input type="text" name="username" id="username" class="" placeholder="username">
              <span id="usernameCheck"></span>
            </div>
            <div>
              <label for="pass">Password:</label>
              <input type="password" name="pass" id="pass" class="" placeholder="password">
            </div>
            <div>
              <button name="register" id="register" class="button button-register" form="registerform" onclick="return postRegister(this.form);">Register</button>
            </div>
          </fieldset>
        </form>
      </div>
      <div id="register_response"></div>
    </div>
<?php include '../app/views/partials/loginform.php' ?>
  </div>
</section>
    <script type="text/javascript" src="./js/register.js"></script>
<?php include '../app/views/partials/foot.php'; ?>
