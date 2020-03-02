<?php
require_once '../db_config.php';



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/shared.css">
    <link rel="stylesheet" href="../styles/homepage_style.css">
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
        <form class=""  method="POST">
          <label for="header">Picture Name:</label>
          <br>
          <input type="text" name="header" value="">
          <br>
          <label for="img">Chose picture to upload:</label>
          <br>
          <input type="file" name="fileToUpload" id="fileToUpload">
          <br>
          <label for="description">Description for picture:</label>
          <br>
          <input type="text" name="description" value="">
          <br>
          <input type="submit" name="" value="Submit">
        </form>
      </article>

    </div>
  </body>
</html>

<?php
if ($_POST) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  print basename($_FILES[$_POST['fileToUpload']]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  print $imageFileType;
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  }



  //$_POST[img];
  $description = $_POST[description];
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname",
      $username,
      $password,
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      $stmt = $conn->prepare("INSERT INTO picture (user, header, description, picture) VALUES ('NoobEjby' ,'$header' ,'$description','$base64' );");
      $stmt->execute();
      // $stmt->setFetchMode(PDO::FETCH_ASSOC);
      // $result = $stmt->fetchAll();
      //print_r($result);
      $stmt = $conn->prepare("SELECT picture FROM picture;");
      $stmt->execute();
      $result = $stmt->fetchAll();
  } catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  }
  $conn = null;
}



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",
    $username,
    $password,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $stmt = $conn->prepare("SELECT * FROM picture;");
    $stmt->execute();
    $result = $stmt->fetchAll();

echo "<br>";
foreach ($result as $row) {
    echo "<img src=$row[picture]><img/>";
}

} catch (PDOException $e) {
echo "Error: " . $e->getMessage();
}
$conn = null;
 ?>
