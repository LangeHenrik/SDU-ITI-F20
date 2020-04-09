<!DOCTYPE html><html>
  <head>
    <title><?= $_SESSION['page_titel'] ?></title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Fontawsome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- OBS Bootstrap Style in fotter -->

    <!-- lokal stylesheet-->
    <link rel="stylesheet" type="text/css" href="/Mschr18-Phans18-Mach018/mvc/public/css/style.css">

  </head>
  <!--Comment-->
  <body>
    <header>
      <?php
        include_once('navbar.php');
      ?>
    </header>
    <section class="container-fluid">

      <?php if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in']) ) { ?>

        <div class="custom-container custom-nav-collapse-show mb-2">
        <?php
          include('../app/views/partials/logOutForm.php');
        ?>
        </div>
        
      <?php } ?>

      <div class="jumbotron">
        <div class="container">
          <h1 class="page-titel"><?= $_SESSION['page_header::before'] . "ChalkB<i class='fas fa-chalkboard'></i>rd" . $_SESSION['page_header::after']?> </h1>
          <p class="lead"><?= $_SESSION['page_sub_header']?></p>
        </div>
      </div>
