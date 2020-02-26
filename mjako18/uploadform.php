<?php
  require_once "./config.php";

  $logout = filter_input(INPUT_GET, 'logout');

  if($logout) {
    $account->logout();
    //redirect
  }

  if(!$account->isLoggedIn()) {
    // redirect
  }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <header>
    <nav>
    </nav>
  </header>
  <section>
    <div class="container">
      <form id="uploadForm" action="upload.php" method="post">
        <fieldset>
          <legend>Image upload</legend>
          <input type="text" name="caption" id="caption" placeholder="Write caption">
          <textarea name="description" id="description" placeholder="Write description"></textarea>
          <input type="file" name="image" id="image" placeholder="Find image">
          <button type="submit" name="" id="" form="uploadForm">Upload image</button>
        </fieldset>
      </form>
    </div>
  </section>
  <footer>
  </footer>
</body>
</html>
