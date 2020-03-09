<?php

require_once ("db_config.php");

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);

$sql = 'CALL GetImages()';

// prepare for execution of the stored procedure
$stmt = $pdo->prepare($sql);

// execute the stored procedure
$stmt->execute();

$stmt->closeCursor();

$row = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

if ($row) {
    $ok = true;
    foreach ($row as $image) {

        echo "<a href={$image['path']}>click here</a>" . PHP_EOL;

    }
}