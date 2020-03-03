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
  <title>Upload Images</title>
  <link type="text/css" rel="stylesheet" href="CSS/responsive.css">
  <link type="text/css" rel="stylesheet" href="CSS/design.css">
</head>
<body>
  <header>
    <nav class="nav navbar-fixed hidden">
      <ul class="hide-s">
        <li class="menu skew-right float_right menu-right-end menu-current hidden"><a href="uploadform.php">upload</a></li>
        <li class="menu skew-right float_right hidden"><a href="gallery.php">pictures</a></li>
        <li class="menu skew-right float_right hidden"><a href="users.php">users</a></li>
        <li class="menu skew-right float_right shown menu-right-end"><a href="register_form.php">register</a></li>
        <li class="menu skew-right float_right"><a href="index.php">frontpage</a></li>
      </ul>
<!-- folding menu -->
      <div class="hide-l hide-m menu-toggle" onclick="menu_toggle();"><span class="float_right">&#9776;</span></div>
      <ul id="mobile-menu" class="hide-l hide-m hide-s">
        <li class="menu"><a href="index.php">frontpage</a></li>
        <li class="menu shown"><a href="register_form.php">register</a></li>
        <li class="menu hidden"><a href="users.php">users</a></li>
        <li class="menu hidden"><a href="gallery.php">pictures</a></li>
        <li class="menu hidden menu-current"><a href="uploadform.php">upload</a></li>
<!-- folding menu -->
      </ul>
    </nav>
  </header>
  <section>
    <div class="container-fluid fixed-nav">
      <div class="col-xl-4 col-m-4" id="upload">
        <div id="upload_response"></div>
        <div>
          <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <legend>Image upload</legend>
              <div>
                <input type="text" name="caption" id="caption" placeholder="Write caption">
              </div>
              <div>
                <textarea name="description" id="description" placeholder="Write description"></textarea>
              </div>
              <div>
                <input type="file" name="image" id="image" placeholder="Find image" oninput="validateImage(this.form);">
              </div>
              <div>
                <button type="button" name="" id="" form="uploadForm" onclick="postUpload(this.form);">Upload image</button>
              </div>
            </fieldset>
          </form>
          <div><progress id="fileUploadProgress" min="0" max="100" value="0">0% complete</progress></div>
        </div>
      </div>
      <div class="col-xl-4 col-m-4"><img id="preview" alt=""/><div class="hidden" id="fileInfo"></div></div>
      <div class="col-xl-4 col-m-4">
        <div id="logoutDiv" class="<?php echo $logout_classes ?>">
          <button name="logout" id="logout" class="button button-logout" onclick="logout('upload');">Log out</button>
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
  <script type="text/javascript" src="js/upload.js"></script>
  <script>
    checkLoggedIn();
    if(!loggedIn) {
      const insert = document.querySelector('#upload');
      removeChildren(insert);
      var p = document.createElement('p');
      p.appendChild(document.createTextNode('Only registered users can see the gallery. Please log in.'));
      insert.appendChild(p);
      const menu = document.querySelectorAll('.menu'); // Array
      menu.forEach(changeHidden);
      document.querySelector('#loginFormDiv').classList.add('shown');
      document.querySelector('#loginFormDiv').classList.remove('hidden');
      document.querySelector('#logoutDiv').classList.remove('shown');
      document.querySelector('#logoutDiv').classList.add('hidden');
    }
  </script>
</body>
</html>
