<?php
include 'authentication.php';
include 'config.php';


// If upload button is clicked ...
if (isset($_POST['upload'])) {
    // Get Header
    $Header = htmlentities($_POST['Header']);
    // Get Description
    $Description = htmlentities($_POST['Description']);
    // Get User
    $UserID = $_SESSION["id"];
    // Get image, data and mine
    $Image = $_FILES['MyFile']['name'];
    $Mime = $_FILES['MyFile']['type'];
    $Data = file_get_contents($_FILES['MyFile']['tmp_name']);

    try {
        $db = new PDO($PDO_CONFIG, $DB_USERNAME, $DB_PASSWORD);
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // insert data picture
        $sql = ("INSERT INTO picture (Mime, Image, Data, Header, Description, UserID) 
        VALUES (:Mime, :Image, :Data, '$Header', '$Description', '$UserID')");

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':Mime', $Mime, PDO::PARAM_STR, 50);
        $stmt->bindParam(':Image', $Image, PDO::PARAM_STR, 256);
        $stmt->bindParam(':Data', $Data);

        // executes the statment
        $stmt->execute();

        // shows if the connection fails
        echo "Connected successfully";

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
    <link rel="stylesheet" type="text/css" href="../../../../css/Stylesheet.css" />
    <link rel="stylesheet" type="text/css" media="(max-width: 1000px)" href="../../../../css/mobile-view.css"/>

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
                <div class="nested" id="upload-nested">
                    <div class="uploadForm">
                        <form method="POST" action="upload" enctype="multipart/form-data">
                            <input class="input" type="file" name="MyFile" accept="image/*" required>
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
<script src="../../../../js/Default.js"></script>

</html>