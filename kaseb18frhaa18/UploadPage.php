<html>

<head>
</head>

<body>
  <form action="post">
    <input type="text" name="head">

    <textarea name="description" id="description" cols="30" rows="10"></textarea>

    <input type="file" name="file">

    <button type="submit" value="Upload" name="upload">Upload now</button>
  </form>
</body>

</html>


<?php
require("database.php");

session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  echo '<h3 id="name">' . $_SESSION["name"] . '</h3>';
} else {
  function_alert("You have to be logged in, to access this page");
  header("location: index.php");
  exit;
}

function function_alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}

if (isset($_POST['upload'])) {

  $name = $_FILES['file']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($name);
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
    $statement = 'insert into feed(head, description, photo) values(:head, :description, :photo)';
    $parameters = array(array(":head", $head), array(":description", $description), array(":photo", $photo));

    talkToDB($statement, $parameters);

    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
  }
}

//mangler html
?>