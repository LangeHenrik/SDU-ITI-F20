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
      <form id="uploadForm" action="upload.php" method="post">
        <fieldset>
          <legend>Image upload</legend>
          <div>
            <input type="text" name="caption" id="caption" placeholder="Write caption">
          </div>
          <div>
            <textarea name="description" id="description" placeholder="Write description"></textarea>
          </div>
          <div>
            <input type="file" name="image" id="image" placeholder="Find image">
          </div>
          <div>
            <button type="submit" name="" id="" form="uploadForm">Upload image</button>
          </div>
        </fieldset>
      </form>
    </div>
  </section>

  <footer>
  </footer>
  <script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>
