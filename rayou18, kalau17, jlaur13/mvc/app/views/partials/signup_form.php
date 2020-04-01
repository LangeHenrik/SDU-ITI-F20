<?php ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Signup</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
   <link rel="stylesheet" href="/rayou18, kalau17, jlaur13/mvc/public/styles/signupform_style.css">
  </head>
  <body>

  <div class="container">
    <div class="signup">
      <h2 id="form-name">Sign Up</h2>
      <form onkeyup="return program()" action="/rayou18, kalau17, jlaur13/mvc/public/Home/signup" method="post">
        <div class="form-group">
          <label for="username"><i class="fas fa-user"></i></label>
          <input id="usernameInput" type="text" name="username" placeholder="Your Username" required>
          <p>Must be longer that 3 chars</p>
        </div>
        <div class="form-group">
          <label for="password"> <i class="fas fa-lock"></i></label>
          <input  id="passwordInput" type="password" name="password" placeholder="Password" required>
          <p>Must contain: 1 captital letter, 1 small letter and a length of 8</p>
        </div>
        <div class="form-group">
          <label for="repeat_password"> <i class="fas fa-lock replock"></i></label>
          <input id="repeatPasswordInput" type="password" name="repeat_password" placeholder="Repeat your password" required>
          <p>Must match your first password entry</p>
        </div>
        <input  type="submit" id="signup_btn" class="buttons"  name="button" value="Submit">
        <input   class="buttons" action="" value="Login Instead">
      </form>
    </div>
  </div>

  <script src="/rayou18, kalau17, jlaur13/mvc/public/js/signup_script.js" type="text/javascript"></script>
  </body>
</html>
