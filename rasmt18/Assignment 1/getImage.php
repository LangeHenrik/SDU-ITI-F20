<?php
require_once 'db_config.php';
header('Content-Type: text/plain');
function printImage($id)
{
    global $servername, $dbname, $username, $password;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
            $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $stmt = $conn->prepare("Select * from image where img_id = :img_id");
        $stmt->bindParam(':img_id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        echo "<div class='image'>";
        foreach ($result as $row) {
            echo "<div class='picture'><b>Title of the image:</b> <p>$row[header]</p>";
            echo "<br>";
            echo "<b>Description:</b> <p>$row[description]<p>";
            echo "<br>";
            echo "<b>Contributer:</b> <p>$row[username]<p>";
            echo "<br>";
            echo "<b>Image:</b>";
            echo "<br>";
            echo "<img src='$row[img]' alt=''></img>";
            echo "<br></div>";
        }

        echo "</div>";

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_GET['img_id'])) {
    printImage($_GET['img_id']);
} else {
    echo 'error';
}


?>
