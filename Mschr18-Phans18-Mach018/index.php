<!DOCTYPE html><html>
  <head>
    <title>ChalkBoard-Frontpage</title>
    <meta name="viewport" content="width=device width, initial scale=1.0">
    <!--stylesheet-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--Fontawsome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--reuse loginnav-->
    <script type="text/javascript">

    </script>
  </head>
  <!--Comment-->
  <body>
    <?php
      include_once('loginnav.php');
    ?>

       <div class="content" id="content">
         <div class="welcomme" id="welcomme">
           <h1>Welcomme to ChalkBoard <i class="fas fa-chalkboard"></i></h1>
           <h3> <i>BETA V.0.0.1</i></h3>
           <h2><i class="fas fa-user-friends fa-xs"></i> Connect widt you friends.</h2>
           <h2><i class="fas fa-image fa-xs"></i> Post images.</h2>
           <h2><i class="far fa-comments fa-xs"></i> Share comments.</h2>
           <br>
           <h2>Please login or <a href="registration.php">sign up <i class="fas fa-user-plus fa-s"></i></a></h2>
         </div>
       </div>


  </body>
  <?php
   include_once('footer.php');
  ?>
</html>
