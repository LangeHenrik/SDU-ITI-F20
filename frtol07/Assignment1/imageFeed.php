<?php
ob_start();

session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Image feed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<!--Comment-->

<body>
<br><br><br><br><br><br>


<div class="container">
    <label class="label" >Click here to log out </label>
    <br><br>
    <form action="logout.php">
        <input class="bigBtn" type="submit" value="Log out" />
    </form>
</div>

<br>
<br>
<div class="container">
    <label class="label">Click here to go to user list page</label>
    <br><br>
    <form action="userList.php">
    <input class="bigBtn" type="submit" value="User list" />
    </form>
    <br>
    <br>
</div>


<br>

<div class="container">
    <label class="label">Upload another image:</label>
    <br><br>
    <form action="uploadChooseFile.php">
        <input class="bigBtn" type="submit" value="Go upload" />
    </form>
</div>

</body>

</html>

<?php
include 'connect.php';

$files = glob("uploads/*.*");
for ($i = 0; $i < count($files); $i++) {
    $image = $files[$i];
    $supported_file = array(
        'gif',
        'jpg',
        'jpeg',
        'png'
    );

    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
//    if (in_array($ext, $supported_file)) {
//
//
//        $stmt = $pdo->query("SELECT name,user, description, header, image  FROM images");
//        while ($row = $stmt->fetch()) {
//            echo "<br>"."<br>";
//            echo "<div class='container'> ";
//            echo "<h3>";
//            echo $row['header'];
//            echo "</h3>";
//            echo "<b>";
//            echo $row['description'];
//            echo "</b>";
//            echo "<br>";
//            echo "Uploadet by:";
//            echo "<b>";
//            echo $row['user'];
//            echo "</b>". "<br>";
//            echo "<div class='image'> ";
//            echo '<img src="' .$row["image"] . '" width="250" height="250"/>';
//            echo "</div>";
//            echo "</div>";
//        }
//
//    } else {
//        continue;
//    }
}

if (in_array($ext, $supported_file)) {


    $stmt = $pdo->query("SELECT name,user, description, header, image  FROM images");
    while ($row = $stmt->fetch()) {
        echo "<br>";
        echo "<div class='container'> ";
        echo "<h3>";
        echo $row['header'];
        echo "</h3>";
        echo "<b>";
        echo $row['description'];
        echo "</b>";
        echo "<br>";
        echo "Uploadet by:";
        echo "<b>";
        echo $row['user'];
        echo "</b>". "<br>";
        echo "<div class='image'> ";
        echo '<img src="' .$row["image"] . '" width="250" height="250"/>';
        echo "</div>";
        echo "</div>";
    }

} else {
//    continue;
}

?>

<?php

?>

<!---->
<?php
//
//include('functions.php');
//
//
//?>

