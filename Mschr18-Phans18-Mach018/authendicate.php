<?php
  if(!$_SESSION['logged_in']) {
    ?>
      <div class="Unauthorized">
        <h1>Web page error: 401 Unauthorized!</h1>
        <h2><a href="index.php">Go to frontpage <i class="fas fa-house-damage"></i></a></h2>
      </div>
    <?php
    die();
    }
?>
