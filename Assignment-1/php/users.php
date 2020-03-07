<!DOCTYPE html>
<html>

<head>
  <title>
    Assignment 1
  </title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="../css/Stylesheet.css" />

  <link rel="icon" href="../img/icon.png" type="png" />
</head>

<body>
  <div id="content">
    <span class="slide">
      <a href="#" onclick="openSlideMenu()">
        <i id="openMenu" class="fas fa-arrow-circle-right"></i>
      </a>
    </span>

    <?php
    require 'navigation.php';
    ?>
    <div class="wrapper">
      <div id="title">
        <h1>Userlist</h1>
      </div>
      <div class="inner-wrapper">
        <?php
        require_once 'config.php';

        try {
          $db = new PDO("mysql:host=$DB_SERVER;port=3307;dbname=$DB_DATABASE", $DB_USERNAME, $DB_PASSWORD);
          // set the PDO error mode to exception
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          // selects the data
          $query = "SELECT userinfo.Image, userinfo.Name, userinfo.BDate, user.Username
          FROM userinfo INNER JOIN user ON userinfo.LoginID = user.ID";

          $user = $db->prepare($query);
          $user->execute();
          $users = $user->fetchAll();

          //echo "Connected successfully";
        } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }

        foreach ($users as $row) {
          echo "<div class='nested'>";
          echo "<div class='imagefeed'>";
          echo "<h3>" . $row['Name'] . "</h3>"; 
          echo "<div class='image'>";
          echo "<img src=../img/pictures/" . $row['Image'] . " class='avatar' />";
          echo "</div>";
          echo "<div class='uname'><b><i>~ " . $row['Username'] . " ~</i></b></div>";
          echo "<p id='userdate'>" . date("d/M/Y", $row['BDate']) . "</p>";
          echo "</div>";
          echo "</div>";
        }
        ?>
      </div>
    </div>
    <?php
    require 'login.php';
    ?>
</body>
<script src="../js/Default.js"></script>

</html>