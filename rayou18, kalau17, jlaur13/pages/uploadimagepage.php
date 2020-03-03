<?php
if (session_status() == PHP_SESSION_NONE){
  session_start();
  $_SESSION['logged_in'] ?  : header("Location: ./homepage.php");
}


require_once '../db_config.php';

$session_user = $_SESSION['username'];

   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

      $header = htmlentities($_POST['header']);

      $base64 = $base64 = 'data:image/' . $file_ext . ';base64,' . base64_encode(file_get_contents($_FILES['image']['tmp_name']));

      $description = htmlentities($_POST['description']);
      try {

          $conn = new PDO("mysql:host=$servername;dbname=$dbname",
          $username,
          $password,
          array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          $stmt = $conn->prepare("INSERT INTO picture (user, header, description, picture) VALUES ('$session_user' ,'$header' ,'$description','$base64' );");
          $stmt->execute();;
          $stmt = $conn->prepare("SELECT picture FROM picture;");
          $stmt->execute();
          $result = $stmt->fetchAll();
          header("Location: imagefeed.php");
      } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      }
      $conn = null;
   }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/shared.css">
    <link rel="stylesheet" href="../styles/uploadimage_style.css">
  </head>
  <body>

      <div class="navbar">
        <ul>
          <li><a class="logo" href="homepage.php"><i class="fas fa-rocket"></i></a></li>
          <li><a  href="homepage.php">Home Page</a></li>
          <li> <a href="imagefeed.php">Image Feed</a></li>
          <li><a href="registrationpage.php">Registration Page</a></li>
      		<li><a href="userlistpage.php">User List</a></li>
      		<li><a class="active" href="uploadimagepage.php">Upload Image <i class="fas fa-upload"></i></a></li>
          <?php if($_SESSION['logged_in'] == true) echo '<li><a class="cred_btns" id="logout_btn"type="button" href="../backend/logout.php" name="logout_btn">Logout</a></li>';  ?>
        </ul>
      </div>


    <div class="wrapper">

      <article class="text_info">
        <h2>Upload picture</h2>
        <form class=""  method="POST" enctype = "multipart/form-data">
          <label for="header">Picture Name:</label>
          <br>
          <input type="text" name="header" value="" required>
          <br>
          <label for="img">Chose picture to upload:</label>
          <br>
          <input type = "file" name = "image" required/>
          <br>
          <label for="description">Description for picture:</label>
          <br>
          <textarea cols="50" rows="6" name="description" id="description" value="" maxlength="250" required></textarea>
          <br>
          <input type="submit" name="" value="Submit">
          <ul>
          </ul>
        </form>
      </article>

    </div>
  </body>
</html>
