<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      Assignment 1
    </title>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
      integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="css/mobileview.css">
    <link rel="stylesheet" type="text/css" href="css/Stylesheet.css" />
    <link rel="icon" href="img/icon.png" type="png" />
  </head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
  $("button").click(function(){
    $.ajax({url: "title.txt", success: function(result){
      $("#title1").html(result);
    }});
  });
});
  </script>
  <body>
    <div id="content">
      <span class="slide">
        <a href="#" onclick="openSlideMenu()">
          <i id="openMenu" class="fas fa-arrow-circle-right"></i>
        </a>
      </span>
      <?php
      require 'php/navigation.php';
      ?>
      <div class="wrapper">
        <div id="title">
          <h1 id="title1">Responsive animated sidebar</h1>
          <button>Change the title</button>
        </div>
        <?php
        require 'php/inner-wrapper.php';
        ?>
      </div>
    </div>
    <?php
    require 'php/login.php';
    ?>
  </body>
  <script src="js/Default.js"></script>
</html>