<?php

if (session_status() == PHP_SESSION_NONE){
  session_start();
  $_SESSION['logged_in'] ?  : header("Location: ./homepage.php");
}
require_once '../db_config.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Image Feed</title>
	<link rel="stylesheet" type="text/css" href="../styles/imagefeed_style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../styles/shared.css">
</head>
<body>
<div class="navbar">
	<ul>
		<li><a class="logo" href="homepage.php"><i class="fas fa-rocket"></i></a></li>
		<li><a href="homepage.php">Home Page</a></li>
		<li><a class="active" href="imagefeed.php">Image Feed</a></li>
		<li><a href="userlistpage.php">User List</a></li>
		<li><a href="uploadimagepage.php">Upload Image <i class="fas fa-upload"></i></a></li>
		<?php if($_SESSION['logged_in'] == true) echo '<li><a class="cred_btns" id="logout_btn"type="button" href="../backend/logout.php" name="logout_btn">Logout</a></li>';  ?>
	</ul>
</div>
<div class="picwrapper">
  <?php
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",
    $username,
    $password,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $stmt = $conn->prepare("SELECT * FROM picture;");
    $stmt->execute();
    $result = $stmt->fetchAll();

  foreach ($result as $row) {
    $header = $row['header'];
    $picture = $row['picture'];
    $description = $row['description'];
    $pictureOwner = $row['user'];



    ?>
    <div class="singlepicwrapper">
  		<h2><?php echo $header;?></h2>
      <div class="picture">
        <img class="image" src= "<?php echo $picture;?>" alt="TitleOfPicture">
      </div>
  		<div class="description">
        <?php echo $description;?>
      </div>
      <div class="uploadedby">
        <p>Uploaded by: <?php echo $pictureOwner;?></p>
      </div>
      <?php if ($_SESSION['username'] == $pictureOwner){?>
        <div class="deletButton">
          <input id="deleteBtn" type="button" name="" value="Delete">
        </div>
        <?php
      }
  	echo "</div>";

  }

  } catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  }
  $conn = null;
  ?>


</body>
</html>
