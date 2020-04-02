<?php
  if( !isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    ?>
    <section id="content">
      <div class="Unauthorized">
        <h1>Web page error: 401 Unauthorized!</h1>
        <h2><a href="index.php">Go to frontpage <i class="fas fa-house-damage"></i></a></h2>
        <h2>login</h2>
        <?php
          include('../partials/loginform.php');
         ?>
         <h2><a href="registration.php">Sign up <i class="fas fa-user-plus fa-s"></i></a></h2>

      </div>
    </section>
    <?php
    include_once('../partials/footer.php');
    die();
    }
?>
