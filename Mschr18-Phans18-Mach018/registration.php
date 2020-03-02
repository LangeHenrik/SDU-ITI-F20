<!DOCTYPE html><html>
  <head>
    <title>ChalkBoard - Frontpage</title>
    <meta name="viewport" content="width=device width, initial scale=1.0">
    <!--stylesheet-->
    <link rel="stylesheet" type="text/css" href="Include/style.css">
    <!--Fontawsome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
  <!--Comment-->
  <body>
    <?php
      include_once('loginnav.php');
    ?>

    <div class="content" id="content">
      <div class="registration" id="registration">
        <h1>Sign up to ChalkBoard <i class="fas fa-chalkboard"></i></h1>
        <h3> <i>BETA V.0.0.1</i></h3>
        <br>

        <form onsubmit="test" method="post">

          <label for="fuldname" >Fuld name*</label> <br>
          <input type="text" name="fuldname" id="fuldname" tabindex="1"/> <br>
          <p class="info" id="fuldnameinfo"></p>

          <label for="newusername" >Username*</label> <br>
          <input type="text" name="newusername" id="newusername" tabindex="2"/> <br>
          <p class="info" id="newusernameinfo"></p>

          <label for="newpassword">Password*</label><br>
          <input type="password" name="newpassword" id="newpassword" tabindex="3"/> <br>
          <p class="info" id="newpasswordinfo"></p>

          <label for="phone">Phone number*</label><br>
          <input type="text" name="phone" id="phone" tabindex="4"/> <br>
          <p class="info" id="phoneinfo"></p>

          <label for="email">Email adress*</label><br>
          <input type="text" name="email" id="email" tabindex="5"/><br>
          <p class="info" id="emailinfo"></p>

          <i class="fas fa-user-plus"></i><input type="submit" name="submit" id="signup"  value="Sign up" tabindex="7"/>
        </form>

        <script src="Include/registration.js"></script>

      </div>
    </div>

  </body>
  <?php
   include_once('footer.php');
  ?>
</html>
