<?php
// Create database connection
include 'config.php';

// If upload button is clicked ...
if (isset($_POST['upload'])) {
  // Get image name
  $Image = $_FILES['Image']['name'];
  // Get header
  $Header = mysqli_real_escape_string($db, $_POST['Header']);
  // Get Description
  $Description = mysqli_real_escape_string($db, $_POST['Description']);
  // Get User
  $UserID = mysqli_real_escape_string($db, $_POST['UserID']);

  // image file directory
  $target = "img/" . basename($Image);

  $sql = "INSERT INTO images (Image, Header, Description, UserID) VALUES ('$Image', '$Header', '$Description', '$UserID')";
  // execute query
  mysqli_query($db, $sql);

  if (move_uploaded_file($_FILES['Image']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
  } else {
    $msg = "Failed to upload image";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Image Upload</title>
  <link rel="stylesheet" type="text/css" href="Stylesheet/Stylesheet.css" />
</head>

<body>
  <div class="grid-container">
    <div class="itemheader">
      <h1>upload<b class="headingh1"> image</b></h1>
    </div>

    <?php
    require 'Sidemenu.php';
    ?>

    <div class="itemmain">
      <div id="content">
        <form method="POST" action="Upload.php" enctype="multipart/form-data">
          <input type="hidden" name="size" value="1000000">
          <div>
            <input type="file" name="Image" accept="image/*" required>
          </div>
          <div>
            <input type="text" placeholder="Write a header" name="Header" required />
          </div>
          <div>
            <textarea id="text" cols="40" rows="4" name="Description" placeholder="Say something..." required></textarea>
          </div>
          <div>
            <input type="text" placeholder="Choose a user" name="UserID" required />
          </div>
          <div>
            <button type="submit" name="upload" class="btn">POST</button>
          </div>
        </form>
      </div>
    </div>
</body>

</html>