<?php
session_start();

require_once 'db_config.php';

$ok = true;
$messages = array();

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES['file']["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
$check = getimagesize($_FILES['file']["tmp_name"]);
if ($check === false) {
    $messages[] = "File is not an image.";
    $ok = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 500000) {
    $messages[] = "Sorry, your file is too large.";
    $ok = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    $messages[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $ok = 0;
}

if ($ok) {

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);

    // calling stored procedure command
    $sql = 'CALL InsertImage(:path,:header,:description,:uploadtime)';

    // prepare for execution of the stored procedure
    $stmt = $pdo->prepare($sql);

    $time = time();
    $name = htmlspecialchars($_FILES["file"]['name']);
    $path = $target_dir . $name;
    $header = htmlspecialchars($_POST["header"]);
    $description = htmlspecialchars($_POST["description"]);
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
    $messages[] = "Successful upload";
}

echo json_encode(
    array(
        'ok' => $ok,
        'messages'=>$messages
    )
);


