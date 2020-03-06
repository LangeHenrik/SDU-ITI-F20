<?php
    require "header.php";
?>
  <div>
      <form action="./includes/login.php" method="post">
          <input type="text" name="username-login" id="username-login" placeholder="Username">
          <input type="password" name="password-login" id="password-login" placeholder="Password">
          <button type="submit" name="login-submit">Log-in</button>
      </form>
      <br />
      <form action="./includes/logout.php" method="post">
          <button type="submit" name="logout-submit">Log-out</button>
      </form>
  </div>
  <main>
    <div class="wrapper-main">
      <div id="formContent">
        <p class="login-status">You are logged out!</p>
        <p class="login-status">You are logged in!</p>
      </div>
    </div>
  </main>

<?php
    require "footer.php";
?>