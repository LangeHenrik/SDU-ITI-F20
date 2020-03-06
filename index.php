<?php
    require "header.php";
?>
  <div>
      <form action="./includes/logout.php" method="post">
          <button type="submit" name="logout-submit">Log-out</button>
      </form>
  </div>
  <main>
    <div class="wrapper-main">
      <div id="formContent">
        <p class="login-status">You are logged out!</p>
        <p class="login-status">You are logged in!</p>
      </div>
    </div>
  </main>

<?php
    require "footer.php";
?>