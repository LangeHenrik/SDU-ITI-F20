<!DOCTYPE html>
<html>

<head>
  <title>Assignment 1</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="Stylesheet/Stylesheet.css" />
  <link rel="icon" href="img/icon.png" type="png" />
</head>

<body>
  <div class="grid-container">
    <div class="itemheader">
      <h1>This is the <b class="headingh1">gallery</b></h1>
    </div>

    <?php
    require 'Sidemenu.php';
    ?>

    <div class="itemmain">
      <div class="container">
        <?php
        include 'config.php';

        $result = mysqli_query($db, "SELECT images.Image, images.Header, images.Description, logins.Username 
        FROM images JOIN logins ON images.UserID = logins.ID");

        while ($row = mysqli_fetch_array($result)) {
          echo "<div style='word-break: break-all; text-align: center;'>";
          echo "<img src='img/" . $row['Image'] . "' style='max-height: 200px; max-width: 400px;' >";
          echo "<h2>" . $row['Header'] . "</h2><b><i>~ " . $row['Username'] . " ~</i></b>";
          echo "<p>" . $row['Description'] . "</p>";
          echo "</div>";
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>