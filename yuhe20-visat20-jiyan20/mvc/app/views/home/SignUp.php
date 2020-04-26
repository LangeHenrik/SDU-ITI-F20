<?php include '../app/views/partials/header.php'; ?>

<div class="content" id="registration">
    <div>
        <main>
          <div class="wrapper-main">
            <div id="formContent">
              <form action="/yuhe20-visat20-jiyan20/mvc/public/Register/registration" method="post" onKeyUp="return validateFields()" class="form-signup" >
                <h1>Sign Up</h1>
                <br>
                <input placeholder="Your email" type="text" name="email" id="email" required>
                <input placeholder="Username" type="text" name="username" id="username" required>
                <input placeholder="Password" type="password" name="password" id="password" onKeyUp="checkPasswordStrength()" required>
                <div id="password-strength-status"></div>
                <input type="password" name="pwd-repeat" id="pwd-repeat" placeholder="Repeat Password" require>
                <button type="submit" name="register"value="Register">Sign-up</button>
             </form>
            </div>
          </div>
        </main>
    </div>
</div>