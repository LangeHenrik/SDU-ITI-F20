<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic.html -->
  <title>Upload</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="myscripts.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="UTF-8" />
</head>

<body>
  <div class="wrapper">
    <div class="menu">
      <h2>Menu</h2>
      <ul>
        <li> <a href=# onclick="alert('You are already logged in.')">Login</a></li>
        <li> <a href=registration.php>Register</a></li>
        <li> <a href=uploadpage.php>Upload</a></li>
        <li> <a href=ImageFeed.php>Image Feed</a></li>
        <li> <a href=User_List.php>User List</a></li>
        <form method="POST">
          <button name="logout" type="logout" value="logout">Log out</button>
        </form>
      </ul>
    </div>
  </div>
  <div class="wrapper">
    <div class="content">
      <form method="post" action="" enctype='multipart/form-data'>
        <input type="text" name="head" placeholder="Enter a header for your upload!">

        <textarea placeholder="Give your upload a small discription!" name="description" id="description" cols="30" rows="10"></textarea>

        <input type="file" name='file'>

        <button type="submit" value="Upload" name="upload">Upload now</button>
      </form>
    </div>
  </div>
</body>

</html>


<?php
error_reporting(0);
require("database.php");

session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  echo '<h3 id="name">' . $_SESSION["name"] . '</h3>';
} else {
  header("location: index.php");
}

if (isset($_POST['logout'])) {
  session_unset();
  session_destroy();
  header("location: index.php");
}

if (isset($_POST['upload'])) {
  $head = trim($_POST["head"]);
  $description = trim($_POST["description"]);


  if (empty($head) || empty($description) || empty($_FILES["file"]["tmp_name"])) {
    echo '<script>alert("Upload Failed. Header or Description is empty or no file was selected!")</script>';
  } elseif ((strlen($head) > 25) or (strlen($description)>250) or ((filesize($_FILES["file"]["tmp_name"])*1.35) > 4294967295)){
    echo '<script>alert("Max titlelength: 25 characters.\nMax description lenght: 250 characters.\nImage file might be too large.")</script>';
  } 
  else {
    $name = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    //husk at indsætte head og description også
    $head = filter_var($_POST['head'], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

      // Convert to base64 
      $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
      $photo = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
      // Insert record
      $statement = 'insert into feed (head, description, photo, person_id) values(:head, :description, :photo, :person_id)';
      $parameters = array(
        array(":head", $head), array(":description", $description),
        array(":photo", $photo), array(":person_id", $_SESSION['id'])
      );

      talkToDB($statement, $parameters);

      // Upload file
      move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
      echo '<script>alert("Upload Success")</script>';
    }
  }
}
?>