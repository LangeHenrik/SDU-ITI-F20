<?php
    session_start();
    require "header.php";
?>
  <main>
    <div class="wrapper-main">
      <div id="formContent">
      <?php if(isset($_SESSION['username'])){ ?>
        <p class="login-status">YOU ARE NOW LOGGED IN!</p>
      <?php } else { ?>
        <p class="login-status">YOU ARE LOGGED OUT! PLEASE LOG IN OR <a href="signup.php" style="color:blue;">SIGN UP</a>!</p>
      <?php } ?>
      </div>
    </div>
  </main>
  </body>
</html>

