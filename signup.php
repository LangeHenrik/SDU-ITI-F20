<?php
    require "header.php";
?>
        <script src="./js/regex.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="./js/passwd_str.js"></script>
        <main>
          <div class="wrapper-main">
            <div id="formContent">
              <h1>Sign-up</h1>
              <form onKeyUp="return validateFields()" class="form-signup" method="post">
                <input type="text" name="username" id="username" placeholder="Username" autofocus require>
                <input type="text" name="email-register" id="email-register" placeholder="E-mail" require>
                <input type="password" name="pwd-register" id="pwd-register"  onKeyUp="checkPasswordStrength();" placeholder="Password" require>
                <div id="password-strength-status"></div>
                <input type="password" name="pwd-repeat" id="pwd-repeat" placeholder="Repeat Password" require>
                <button type="submit" name="signup-submit">Sign-up</button>
              </form>
            </div>
          </div>
        </main>

      <?php
        include './linkdatabase/insert_user.php';
      ?>
      </body>
    </html>