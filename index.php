<?php
    session_start();
    require "header.php";
?>
  <main>
    <div class="wrapper-main">
      <div id="formContent">
      <?php if(isset($_SESSION['username'])){ ?>
        <p class="login-status">You are logged in!</p>
      <?php } else { ?>
        <p class="login-status">You are logged out! Sign Up</p>
      <?php } ?>
      </div>
    </div>
  </main>

<?php
    require "footer.php";
?>