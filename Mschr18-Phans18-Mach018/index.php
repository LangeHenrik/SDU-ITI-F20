<!DOCTYPE html><html>
  <head>
    <title>ChalkBoard-Frontpage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--stylesheet-->
    <link rel="stylesheet" type="text/css" href="include/style.css">
    <!--Fontawsome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--reuse loginnav-->
  </head>
  <!--Comment-->
  <body>
    <header>
      <?php
        include_once('loginnav.php');
      ?>
    </header>
    <section>
      
      <div class="content" id="content">
        <div class="welcomme" id="welcomme">
          <h1>Welcomme to ChalkBoard <i class="fas fa-chalkboard"></i></h1>
          <h3> <i>BETA V.0.0.1</i></h3>
          <h2><i class="fas fa-user-friends fa-xs"></i> Connect widt you friends.</h2>
          <h2><i class="fas fa-image fa-xs"></i> Post images.</h2>
          <h2><i class="far fa-comments fa-xs"></i> Share comments.</h2>
          <br>
          <h2>Please login or <a href="registration.php">sign up <i class="fas fa-user-plus fa-s"></i></a></h2>
          <form method="post" action="page.html" >
            <label for="username">Username</label><br>
            <input type="text" name="name" id="username" tabindex="8" /><br>
            <label for="password">Password</label><br>
            <input type="text" name="name" id="password" tabindex="9" />
            <br>
            <input type="submit" name="submit" id="login" value="Log in"/>
          </form>
        </div>
      </div>

    </section>
    <footer>
      <?php
       include_once('footer.php');
      ?>
    </footer>
  </body>
</html>
