
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      <link rel="stylesheet" href="/rayou18, kalau17, jlaur13/mvc/public/styles/loginform_style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
  </head>
  <body>

  <!-- <div class="container">
 <div class="login">
     <h2 id="form-name">Login</h2>
     <form class="" action="/rayou18, kalau17, jlaur13/mvc/public/Home/login" method="POST">
       <div class="form-group">
         <label for="username"><i class="fas fa-user"></i></label>
         <input type="text" name="username" placeholder="Your Username">
       </div>
       <div class="form-group">
         <label for="password"> <i class="fas fa-lock"></i></label>
         <input type="password" name="password" placeholder="Password">
       </div>
       <input id="login_btn"type="submit" name="login_btn" value="Login">
     </form> -->

        <div class="login-form">
            <form  action="/rayou18, kalau17, jlaur13/mvc/public/Home/login" method="POST">
                <h2 class="text-center">Login</h2>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required="required">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Login </button>
                </div>
            </form>
            <p class="text-center">
                <a href="/rayou18, kalau17, jlaur13/mvc/public/Home/signup">Create an Account</a>
            </p>
            <p class="text-center wrong_info">
                <?=$viewbag['wrongLogin']?>
            </p>
        </div>
  
 <!-- </div> -->
  </body>
</html>
