<!DOCTYPE html><html>
  <head>
    <title>ChalkBoard</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Fontawsome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- OBS Bootstrap Style in fotter -->

    <!-- lokal stylesheet-->
    <link rel="stylesheet" type="text/css" href="../app/views/include/style.css">

  </head>
  <!--Comment-->
  <body>
    <?php
      //echo "Controller: " . $_SESSION['controller'] . "</br>";
      echo "Method: " .$_SESSION['method'] . "</br>";
      echo "Params: " .$_SESSION['method'] . "</br>";
    ?>
    <header>
      <?php
        if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in']) ) {
          include_once('navLoggedIn.php');
        } else {
          include_once('navLoggedOut.php');
        }
      ?>
    </header>
