<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/loginform_style.css">
  </head>
  <body>

  <div class="container">
    <div class="login">
      <h2 id="form-name">Login</h2>
      <form class="" action="../backend/login.php" method="POST">
        <div class="form-group">
          <label for="username"><i class="fas fa-user"></i></label>
          <input type="text" name="username" placeholder="Your Username">
        </div>
        <div class="form-group">
          <label for="password"> <i class="fas fa-lock"></i></label>
          <input type="password" name="password" placeholder="Password">
        </div>
        <input id="login_btn"type="submit" name="login_btn" value="Login">


      </form>
    </div>



  </div>
  </body>
</html>
