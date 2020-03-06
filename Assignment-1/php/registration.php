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
  $Image = base64_encode($_FILES['Image']['name']);

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
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

?>
<form method="POST" action="#" enctype="multipart/form-data">
  <h1>Create account</h1>
  <input type="email" placeholder="E-mail is required" name="Email" required />
  <input type="text" placeholder="Username is required" name="Username" required />
  <input type="password" placeholder="Password is required" name="Password" required />
  <input type="text" placeholder="Your full name is required" name="Name" required />
  <input type="date" value="2000-01-01" name="BDate" required />
  <input type="file" name="Image" accept="image/*" required>
  <button type="submit" name="upload">Sign up</button>
</form>