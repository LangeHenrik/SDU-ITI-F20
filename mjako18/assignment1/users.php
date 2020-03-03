<?php
  require_once "./config.php";

  if($logout) {
    $account->logout();
    //show login box
  }

  if($account->isLoggedIn()) {
    $logout_classes = " ";
    $login_classes = " hidden";
    $menu_logout = " shown";
    $menu_login = " hidden";
  } else {
    $logout_classes = " hidden";
    $login_classes = "";
    $menu_logout = " hidden";
    $menu_login = " shown skew-right-end";
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Userlist</title>
  <link type="text/css" rel="stylesheet" href="CSS/responsive.css">
  <link type="text/css" rel="stylesheet" href="CSS/design.css">
</head>
<body>
  <header>
    <nav class="nav navbar-fixed hidden">
      <ul class="hide-s">
        <li class="menu skew-right float_right menu-right-end hidden"><a href="uploadform.php">upload</a></li>
        <li class="menu skew-right float_right hidden"><a href="gallery.php">pictures</a></li>
        <li class="menu skew-right float_right menu-current hidden"><a href="users.php">users</a></li>
        <li class="menu skew-right float_right shown menu-right-end"><a href="register_form.php">register</a></li>
        <li class="menu skew-right float_right"><a href="index.php">frontpage</a></li>
      </ul>
<!-- folding menu -->
      <div class="hide-l hide-m menu-toggle" onclick="menu_toggle();"><span class="float_right">&#9776;</span></div>
      <ul id="mobile-menu" class="hide-l hide-m hide-s">
        <li class="menu"><a href="index.php">frontpage</a></li>
        <li class="menu shown"><a href="register_form.php">register</a></li>
        <li class="menu menu-current hidden"><a href="users.php">users</a></li>
        <li class="menu hidden"><a href="gallery.php">pictures</a></li>
        <li class="menu hidden"><a href="uploadform.php">upload</a></li>
<!-- folding menu -->
      </ul>
    </nav>
  </header>
  <section>
    <div class="container-fluid fixed-nav">
      <div class="col-xl-8 col-m-8" id="userlist"></div>
      <div class="col-xl-4 col-m-4">
        <div id="logoutDiv" class="<?php echo $logout_classes ?>">
          <button name="logout" id="logout" class="button button-logout" onclick="logout('users');">Log out</button>
        </div>
        <div id="loginFormDiv" class="<?php echo $login_classes ?>">
          <form action="login.php" method="post" id="loginform">
            <fieldset>
              <legend>Login</legend>
              <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="" placeholder="username">
              </div>
              <div>
                <label for="pass">Password:</label>
                <input type="password" name="pass" id="pass" class="" placeholder="password">
              </div>
              <div>
                <button name="login" id="login" class="button button-login" form="loginform" onclick="return postLogin(this.form);">Log in</button> | <button name="" id="" class="button button-register" "register.php">Register account</button>
              </div>
            </fieldset>
          </form>
        </div>
        <div id="login_response"></div>
      </div>
    </div>
  </section>
  <footer>
  </footer>
  <script type="text/javascript" src="./js/util.js"></script>
  <script type="text/javascript" src="./js/menu.js"></script>
  <script type="text/javascript" src="./js/login.js"></script>
  <script>checkLoggedIn();</script>
  <script type="text/javascript" src="js/users.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', getUserList, false);
  </script>
</body>
</html>
