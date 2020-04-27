<?php
// Create database connection
require 'config.php';

// If upload button is clicked ...
if (isset($_POST['upload'])) {

  // Get email
  $Email = htmlentities($_POST['Email']);
  // Get username
  $Username = htmlentities($_POST['Username']);
  // Get password
  $Password = password_hash(htmlentities($_POST['Password']), PASSWORD_DEFAULT);

  // Get name
  $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
  // Get birthday
  $BDate = filter_var($_POST['BDate'], FILTER_SANITIZE_STRING);
  // Get image 
  $Image = file_get_contents($_FILES['MyFile']['tmp_name']);
  $Mime = $_FILES['MyFile']['type'];

  try {
    $db = new PDO($PDO_CONFIG, $DB_USERNAME, $DB_PASSWORD);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // insert email, username, password and auto id
    $db->prepare("INSERT INTO user (Email, Username, Password)
    VALUES('$Email', '$Username', '$Password')")->execute();
    // Get last inserted id 
    $userID = $db->lastInsertId();

    // insert name, birthday, profileimage and id from tabel user
    $sql = "INSERT INTO userinfo (Name, BDate, Mime, Image, LoginID) 
    VALUES('$Name', '$BDate', :Mime, :Image, '$userID')";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':Mime', $Mime, PDO::PARAM_STR, 50);
    $stmt->bindParam(':Image', $Image);

    // executes the statment
    $stmt->execute();

    echo "yay";
    // shows if the connection fails
    echo '<script>console.log("Error connecting before exception"); </script>';

    if (move_uploaded_file($_FILES['MyFile']['tmp_name'], $target)) {
      echo '<script>console.log("Image uploaded"); </script>';
    } else {
      echo '<script>console.log("Error uploading"); </script>';
    }
  } catch (PDOException $e) {
    echo '<script>console.log("Error connecting - Exception ' . $e->getMessage() . '")</script>';
    echo "Connection failed: " . $e->getMessage();
  }
}

?>
<form method="POST" action="../../../../../index.php" enctype="multipart/form-data">
  <h1>Create account</h1>
  <!-- check the email for unwanted characters -->
  <input type="email" placeholder="Email" name="Email" title="Email can not contain special characters" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" required />
  <!-- allowed characters a-z, A-Z, 0-9, . and _ (4 characters to 20) -->
  <input type="text" placeholder="Username" name="Username" title="Allowed username characters is a-z, A-Z, 0-9, .(dot) and _(underline) (minimum 4 characters, maximum 20)" pattern="^(?=.{4,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$" required />
  <!-- minimum 5 characters max 20, at least one uppercase letter, one lowercase letter and one number -->
  <input type="password" placeholder="Password" name="Password" title="Minimum 5 characters maximum 20, at least one uppercase letter, one lowercase letter and one number" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,20}$" required />
  <!-- only alphanumeric and spaces -->
  <input type="text" placeholder="Name" name="Name" title="Only alphanumeric and spaces" pattern="^[a-zA-Z ]*$" required />
  <input type="date" value="2000-01-01" name="BDate" required />
  <input class="input" type="file" name="MyFile" accept="image/*" required>
  <button type="submit" name="upload">Sign up</button>
</form>