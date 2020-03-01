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
  <title>Frontpage</title>
  <link type="text/css" rel="stylesheet" href="CSS/responsive.css">
  <link type="text/css" rel="stylesheet" href="CSS/design.css">
</head>
<body>
  <header>
    <nav class="nav navbar-fixed">
      <div class="container">
        <ul>
          <li class="menu skew-right float_right skew-right-end<?php echo $menu_logout ?>"><a href="uploadform.php">upload</a></li>
          <li class="menu skew-right float_right<?php echo $menu_logout ?>"><a href="gallery.php">pictures</a></li>
          <li class="menu skew-right float_right<?php echo $menu_logout ?>"><a href="users.php">users</a></li>
          <li class="menu skew-right float_right<?php echo $menu_login ?>"><a href="register_form.php">register</a></li>
          <li class="menu skew-right float_right"><a href="index.php">frontpage</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <section>
    <div class="container-fluid fixed-nav">
      <div class="col-xl-8 col-m-8">
        <div>
          <p>Introduction text</p>
        </div>
      </div>
      <div class="col-xl-4 col-m-4">
        <div id="logoutDiv" class="<?php echo $logout_classes ?>">
          <button name="logout" id="logout" class="button button-logout" onclick="logout('index');">Log out</button>
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
                <button name="login" id="login" class="button button-login" form="loginform" onclick="return postForm(this.form, 'login');">Log in</button> | <button name="" id="" class="button button-register" "register.php">Register account</button>
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
  <script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>
