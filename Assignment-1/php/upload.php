<?php
session_start();
// Create database connection
include 'config.php';

if($_SESSION["loggedin"] != 1) {
    echo("<script>location.href = '/index.php';</script>");
}

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    // Get Header
    $Header = htmlentities($_POST['Header']);
    // Get Description
    $Description = htmlentities($_POST['Description']);
    // Get User
    $UserID = $_SESSION["id"];
    // image file directory
    // Get encoded image name
    $Image = $_FILES['Image']['name'];
    // base64_encode(
    // image file directory
    $target = "../img/gallery/" . basename($Image);

    try {
        $db = new PDO("mysql:host=$DB_SERVER;port=3307;dbname=$DB_DATABASE", $DB_USERNAME, $DB_PASSWORD);
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // insert data picture
        $sql = ("INSERT INTO picture (Image, Header, Description, UserID) 
        VALUES ('$Image', '$Header', '$Description', '$UserID')");

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
<!DOCTYPE html>
<html>

<head>
    <title>
        Assignment 1
    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../css/Stylesheet.css" />

    <link rel="icon" href="../img/icon.png" type="png" />
</head>

<body>
    <div id="content">
        <span class="slide">
            <a href="#" onclick="openSlideMenu()">
                <i id="openMenu" class="fas fa-arrow-circle-right"></i>
            </a>
        </span>

        <?php
        require 'navigation.php';
        ?>
        <div class="wrapper">
            <div id="title">
                <h1>Upload your favorite picture</h1>
            </div>
            <div class="inner-wrapper">
                <div class="nested">
                    <div class="uploadForm">
                        <form method="POST" action="upload.php" enctype="multipart/form-data">
                            <input class="input" type="file" name="Image" accept="image/*" required>
                            <input id="inputHeader" type="text" placeholder="Write a header" name="Header" required />
                            <textarea id="text" cols="40" rows="4" name="Description" placeholder="Say something..." required></textarea>
                            <button id="post" type="submit" name="upload">POST</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require 'login.php';
        ?>
</body>
<script src="../js/Default.js"></script>

</html>