<div id="loginFormDiv" class="shown">
  <form action="/mjako18/mvc/public/home/login" method="post" id="loginform">
    <fieldset>
      <legend>Login</legend>
      <div>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" class="" placeholder="username">
      </div>
      <div>
        <label for="pass">Password:</label>
        <input type="password" name="password" id="password" class="" placeholder="password">
      </div>
      <div>
       <button name="login" id="login" class="button button-login" form="loginform" onclick="return postLogin(this.form);">Log in</button> | <button name="" id="" class="button button-register" "register.php">Register account</button>
      </div>
    </fieldset>
  </form>
</div>
<div id="login_response"></div>

