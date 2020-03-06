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
      <h1>These are the <b class="headingh1">Users</b></h1>
    </div>

    <?php
    require 'Sidemenu.php';
    ?>

    <div class="itemmain">
      <div class="container">
        <?php
        require_once 'config.php';

        // Get image 
        $Image = base64_decode($_FILES['Image']['name']);

        try {
          $db = new PDO("mysql:host=$DB_SERVER;port=3307;dbname=$DB_DATABASE", $DB_USERNAME, $DB_PASSWORD);
          // set the PDO error mode to exception
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $query = "SELECT userinfo.Image, userinfo.Name, userinfo.BDate, user.Username
          FROM userinfo INNER JOIN user ON userinfo.LoginID = user.ID";

          $user = $db->prepare($query);
          $user->execute();

          $user->bindColumn(1, $Image, PDO::PARAM_LOB);
          $user->fetch(PDO::FETCH_BOUND);
          header("Content-Type: image");
          $users = $user->fetchAll();

          echo "Connected successfully";
        } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }

        foreach ($users as $row) {
          echo "<div style='word-break: break-all; text-align: center;'>";
          echo "<img src='" . $row[$Image] . "' class='avatar' >";
          echo "<h2>" . $row['Name'] . "</h2><b><i>~ " . $row['Username'] . " ~</i></b>";
          echo "<p>" . $row['BDate'] . "</p>";
          echo "</div>";
        }
        ?>
      </div>
    </div>
  </div>

</body>

</html>