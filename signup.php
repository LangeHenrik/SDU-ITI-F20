<?php
    require "header.php";
?>
        <script src="./js/regex.js"></script>
        <main>
          <div class="wrapper-main">
            <div id="formContent">
              <h1>Sign-up</h1>
              <form onKeyUp="return validateFields()" class="form-signup" method="post">
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="text" name="email-register" id="email-register" placeholder="E-mail">
                <input type="password" name="password-register" id="password-register" placeholder="Password">
                <input type="password" name="pwd-repeat" id="pwd-repeat" placeholder="Repeat Password">
                <button type="submit" name="signup-submit">Sign-up</button>
              </form>
            </div>
          </div>
        </main>

        <?php
          include './linkdatabase/insert_user.php';
        ?>


<?php
    require "footer.php";
?>