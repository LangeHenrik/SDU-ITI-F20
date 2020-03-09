<?php
  require_once "./config.php";

  if($account->isLoggedIn()) {
    $logout_classes = " ";
    $menu_logout = " shown";
  } else {
    $login_classes = "";
    $menu_login = " shown menu-right-end";
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Frontpage</title>
  <link type="text/css" rel="stylesheet" href="./CSS/design.css">
</head>
    
<body>
  <nav>
    <div class="center">
      <ul class="menu">
        <li><a href="index.php">Frontpage</a></li>
        <li><a href="register_form.php">Register</a></li>
      </ul>
    </div>
  </nav>
    
  <div class="wrapper">
    <div class="content">
      <form action="login.php" method="post" id="loginform">
        <fieldset>
          <legend>Login</legend>
          <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username"placeholder="username">
          </div>
          <div>
            <label for="pass">Password:</label>
            <input type="password" name="pass" id="pass"placeholder="password">
          </div>
          <div>
            <button form="loginform" onclick="return postLogin(this.form);">Log in</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>

  <script type="text/javascript" src="./js/util.js"></script>
  <script type="text/javascript" src="./js/login.js"></script>
  <script type="text/javascript" src="./js/menu.js"></script>
  <script>checkLoggedIn();</script>
</body>
</html>
