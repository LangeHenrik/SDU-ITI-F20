<?php
session_start();

require_once 'db_config.php';

$ok = true;
$messages = array();

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES['file']["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$header = htmlspecialchars($_POST["header"]);
$description = htmlspecialchars($_POST["description"]);


if(empty($_FILES)){
    $ok = false;
    $messages[] = "You must choose a picture";
}

if (strlen($header) == 0 || $header == null) {
    $ok = false;
    $messages[] = "You must provide a header for the picture";
}

if (strlen($description) == 0 || $description == null) {
    $ok = false;
    $messages[] = "You must provide a description for the picture";
}



if($ok) {
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['file']["tmp_name"]);
    if ($check === false) {
        $messages[] = "File is not an image.";
        $ok = false;
    }

// Check file size
    if ($_FILES["file"]["size"] > 500000) {
        $messages[] = "Sorry, your file is too large.";
        $ok = false;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        $messages[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $ok = false;
    }
}

if ($ok) {

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);

    // calling stored procedure command
    $sql = 'CALL InsertImage(:path,:header,:description,:uploadtime,:username)';

    // prepare for execution of the stored procedure
    $stmt = $pdo->prepare($sql);

    $time = time();
    $name = htmlspecialchars($_FILES["file"]['name']);
    $path = $target_dir . $name;
    $datetime = date("Y-m-d H:i:s");

    // pass value to the command
    $stmt->bindParam(':path', $path, PDO::PARAM_STR, 200);
    $stmt->bindParam(':header', $header, PDO::PARAM_STR, 200);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR, 200);
    $stmt->bindParam(':uploadtime', $datetime, PDO::PARAM_STR);
    $stmt->bindParam(':username', $_SESSION['logged_in'], PDO::PARAM_STR);


    // execute the stored procedure
    $stmt->execute();

    $stmt->closeCursor();


    $tmpName = $_FILES['file']["tmp_name"];
    $name = basename($_FILES["file"]["name"]);

    if(move_uploaded_file($tmpName,"$target_dir/$name")){
        $messages[] = "Successful upload";
    }
    else{
        $ok = false;
        $messages[] = move_uploaded_file($tmpName,"$target_dir/$name");
    }
}

echo json_encode(
    array(
        'ok' => $ok,
        'messages'=>$messages
    )
);


