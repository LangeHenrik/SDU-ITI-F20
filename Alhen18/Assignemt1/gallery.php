<?php
  require_once "./config.php";

  $logout = filter_input(INPUT_GET, 'logout');

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
  <title>Image Gallery</title>
  <link type="text/css" rel="stylesheet" href="CSS/design.css">
  <link type="text/css" rel="stylesheet" href="CSS/gallery.css">
</head>
<body>
  <nav>
    <ul>
      <li><a href="uploadform.php">upload</a></li>
      <li><a href="gallery.php">pictures</a></li>
      <li><a href="users.php">users</a></li>
      <li><a href="register_form.php">register</a></li>
      <li><a href="index.php">frontpage</a></li>
    </ul>
  </nav>

  <div>
    <div>
      <div id="logoutDiv" class="<?php echo $logout_classes ?>">
        <button name="logout" id="logout" class="button button-logout" onclick="logout('gallery');">Log out</button>
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

  <script type="text/javascript" src="./js/util.js"></script>
  <script type="text/javascript" src="./js/menu.js"></script>
  <script type="text/javascript" src="./js/login.js"></script>
  <script>checkLoggedIn();</script>
  <script type="text/javascript" src="js/gallery.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', getImages, false);
  </script>
</body>
</html>
