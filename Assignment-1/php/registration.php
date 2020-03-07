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
  $Password = base64_encode(htmlentities($_POST['Password']));

  // Get name
  $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
  // Get birthday
  $BDate = filter_var($_POST['BDate'], FILTER_SANITIZE_STRING);
  // Get encoded image name
  $Image = $_FILES['Image']['name'];
  // base64_encode(
  // image file directory
  $target = "img/pictures/" . basename($Image);

  try {
    $db = new PDO("mysql:host=$DB_SERVER;port=3307;dbname=$DB_DATABASE", $DB_USERNAME, $DB_PASSWORD);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // insert email, username, password and auto id
    $db->prepare("INSERT INTO user (Email, Username, Password)
    VALUES('$Email', '$Username', '$Password')")->execute();
    // Get last inserted id 
    $userID = $db->lastInsertId();

    // insert name, birthday, profileimage and id from tabel user
    $sql = "INSERT INTO userinfo (Name, BDate, Image, LoginID) 
    VALUES('$Name', '$BDate', '$Image', '$userID')";
    // executes the statment
    $db->prepare($sql)->execute();

    // shows if the connection fails
    echo "Connected successfully";

    if (move_uploaded_file($_FILES['Image']['tmp_name'], $target)) {
      echo "Image uploaded successfully";
    } else {
      echo "Failed to upload image";
    }
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

?>
<form method="POST" action="../index.php" enctype="multipart/form-data">
  <h1>Create account</h1>
  <!-- check the email for unwanted characters -->
  <input type="email" placeholder="Example@mail.com" name="Email" pattern="\b[\w.!#$%&’*+\/=?^`{|}~-]+@[\w-]+(?:\.[\w-]+)*\b" required />
  <!-- allowed characters a-z, A-Z, 0-9, . and _ (4 characters to 20) -->
  <input type="text" placeholder="User.name_Example" name="Username" pattern="^(?=.{4,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$" required />
  <!-- minimum 5 characters max 20, at least one uppercase letter, one lowercase letter and one number -->
  <input type="text" placeholder="PasswordExample1" name="Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,20}$" required />
  <!-- only alphanumeric and spaces -->
  <input type="text" placeholder="Example of a name" name="Name" pattern="^[a-zA-Z ]*$" required />
  <input type="date" value="2000-01-01" name="BDate" required />
  <input type="file" name="Image" accept="image/*" required>
  <button type="submit" name="upload">Sign up</button>
</form>