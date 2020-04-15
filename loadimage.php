<?php
require 'db_config.php';

$results;
$conn = new PDO("mysql:host=$servername;dbname=$dbname",$dbusername,$dbpassword,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$stmt = $conn->prepare("SELECT username, header, description, image FROM image;");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$results = $stmt->fetchAll();

foreach ($results as $picture){
    echo '<div class="person">';
    echo '<p class="title">' . $picture['username'] ."-" . $picture['header'] . '</p>';
    echo '<p class="description">' . $picture['description']  . "</p>";
    echo '<img src="data:image/png;base64,'. $picture['image'] . '"  alt="error"/>';  
    echo '<br/>';
    echo '</div>';
}
?>