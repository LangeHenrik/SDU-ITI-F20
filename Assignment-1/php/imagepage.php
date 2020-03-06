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
                <h1>Gallery</h1>
            </div>
            <div class="inner-wrapper">
                <?php
                require_once 'config.php';

                try {
                    $db = new PDO("mysql:host=$DB_SERVER;port=3307;dbname=$DB_DATABASE", $DB_USERNAME, $DB_PASSWORD);
                    // set the PDO error mode to exception
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // selects the data
                    $query = "SELECT picture.Image, picture.Header, picture.Description, user.Username 
                    FROM picture JOIN user ON picture.UserID = user.ID";

                    $user = $db->prepare($query);
                    $user->execute();
                    $users = $user->fetchAll();

                    //echo "Connected successfully";
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }

                foreach ($users as $row) {
                    echo "<div class='nested'>";
                    echo "<img src='../img/gallery/" . $row['Image'] . "' >";
                    echo "<h2>" . $row['Header'] . "</h2><b><i>~ " . $row['Username'] . " ~</i></b>";
                    echo "<p>" . $row['Description'] . "</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        <?php
        require 'login.php';
        ?>
</body>
<script src="../js/Default.js"></script>

</html>