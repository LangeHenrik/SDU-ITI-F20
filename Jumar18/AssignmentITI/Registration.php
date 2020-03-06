<?php
// Create database connection
require 'config.php';

// If upload button is clicked ...
if (isset($_POST['upload'])) {
  // Get username
  $Username = htmlentities($_POST['Username']);
  // Get password
  $Password = htmlentities($_POST['Password']);

  // Get name
  $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
  // Get Bday
  $BDate = filter_var($_POST['BDate'], FILTER_SANITIZE_STRING);
  // Get image name
  $Image = base64_encode($_FILES['Image']['name']);

  try {
    $db = new PDO("mysql:host=$DB_SERVER;port=3307;dbname=$DB_DATABASE", $DB_USERNAME, $DB_PASSWORD);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // insert username, password and auto id
    $db->prepare("INSERT INTO user (Username, Password)
    VALUES('$Username', '$Password')")->execute();
    $userID = $db->lastInsertId();

    $sql = "INSERT INTO userinfo (Name, BDate, Image, LoginID) 
    VALUES('$Name', '$BDate', '$Image', '$userID')";
    $db->prepare($sql)->execute();

    echo "Connected successfully";
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Assignment 1</title>
  <link rel="stylesheet" type="text/css" href="Stylesheet/Stylesheet.css" />
  <link rel="icon" href="img/icon.png" type="png" />
</head>

<body>
  <div class="grid-container">
    <div class="itemheader">
      <h1>This is the <b class="headingh1">registration page</b></h1>
    </div>

    <?php
    require 'Sidemenu.php';
    ?>

    <div class="itemmain">
      <div class="container">

        <form method="POST" action="Registration.php" enctype="multipart/form-data">
          <input type="hidden" name="size" value="1000000">
          <div>
            <input type="text" placeholder="Username is required" name="Username" required />
          </div>
          <div>
            <input type="password" placeholder="Password is required" name="Password" required />
          </div>
          <div>
            <input type="text" placeholder="Your full name is required" name="Name" required />
          </div>
          <div>
            <input type="date" value="2000-01-01" name="BDate" required />
          </div>
          <div>
            <input type="file" name="Image" accept="image/*" required>
          </div>
          <div>
            <button type="submit" name="upload" class="btn">Registre</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>