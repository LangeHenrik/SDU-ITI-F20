<?php
    require "header.php";
?>

        <main>
          <div class="wrapper-main">
            <div id="formContent">
              <h1>Sign-up</h1>
              <form class="form-signup" action="includes\signup1.php" method="post">
                <input type="text" name="username-register" id="username-register" placeholder="Username">
                <input type="text" name="email-register" id="email-register" placeholder="E-mail">
                <input type="password" name="password-register" id="password-register" placeholder="Password">
                <input type="password" name="pwd-repeat" id="pwd-repeat" placeholder="Repeat Password">
                <button type="submit" name="signup-submit">Sign-up</button>
              </form>
            </div>
          </div>
        </main>

        <script src="./js/regex.js"></script>

<?php
    require "footer.php";
?>