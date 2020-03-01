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
      <div class="col-xl-4 col-m-4">
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
                <button type="button" name="" id="" form="uploadForm" onclick="postForm(this.form, 'upload');">Upload image</button>
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
      </div>
    </div>
  </section>

  <footer>
  </footer>
  <script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>
