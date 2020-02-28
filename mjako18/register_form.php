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
          <li class="menu skew-right float_right<?php echo $menu_login ?>"><a href="register.php">register</a></li>
          <li class="menu skew-right float_right"><a href="index.php">frontpage</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <section>
    <div class="container-fluid fixed-nav">
      <div class="col-xl-8 col-m-8">
        <div>
          <form action="register.php" method="post" id="registerform">
            <fieldset>
              <legend>Register user</legend>
              <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="" placeholder="username">
              </div>
              <div>
                <label for="pass">Password:</label>
                <input type="password" name="pass" id="pass" class="" placeholder="password">
              </div>
              <div>
                <button name="register" id="register" class="button button-register" form="registerform" onclick="return postForm(this.form, 'register');">Register</button>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <div class="col-xl-4 col-m-4">
      </div>
    </div>
  </section>

  <footer>
  </footer>
  <script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>
