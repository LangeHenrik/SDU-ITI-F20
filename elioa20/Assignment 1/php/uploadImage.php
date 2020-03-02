<?php
session_start();

require_once 'db_config.php';

$ok = true;
$messages = array();


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]['name']);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


// Check file size
if ($_FILES["file"]['name'] > 500000) {
    $ok = false;
    $messages[] = "File is too large!";
}

// Valid file extensions
$extensions_arr = array("jpg", "jpeg", "png", "gif");

// Check extension
if (!in_array($imageFileType, $extensions_arr)) {
    $ok = false;
    $messages[] = $_FILES["file"]['name'];
}

if ($ok) {

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);

    // calling stored procedure command
    $sql = 'CALL InsertImage(:path,:header,:description,:uploadtime)';

    // prepare for execution of the stored procedure
    $stmt = $pdo->prepare($sql);

    $time = time();
    $name = htmlspecialchars($_FILES["file"]['name']). $time;
    $path = $target_dir . $_FILES["file"]['name'];
    $header = htmlspecialchars($_POST["imageHeader"]);
    $description =  htmlspecialchars($_POST["imageDescription"]);
    $datetime = date("Y-m-d H:i:s");

    // pass value to the command
    $stmt->bindParam(':path', $path, PDO::PARAM_STR, 200);
    $stmt->bindParam(':header', $header, PDO::PARAM_STR, 200);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR, 200);
    $stmt->bindParam(':uploadtime', $datetime, PDO::PARAM_STR);

    // execute the stored procedure
    $stmt->execute();

    $stmt->closeCursor();

    // Upload file
    move_uploaded_file($name, $path);
}

echo json_encode(
    array(
        'ok' => $ok,
        'messages' => $messages
    )
);