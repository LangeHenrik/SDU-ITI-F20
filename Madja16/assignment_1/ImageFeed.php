<?php
session_start();
if (isset($_SESSION['session_id'])) {
    
    require_once "dbh.inc.php";

    echo '<a href="index.php">Back</a>';

    $useblob = false;

    $path = 'sample images/sample1.jpg'; // an image in sample folder
    $type = pathinfo($path, PATHINFO_EXTENSION); // retrieve type from $_FILES instead
    $data = file_get_contents($path); // data to encode
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data); // string to save in BLOB

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dBName", $dBUsername, $dBPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        /*   TESTING INSERT. REMOVE LATER <<<START>>>

        $description = "this is my description";
        $myheader = "this is my header";
        $owner = "bob";

        // this is incredibly ugly
        $stmt = $conn->prepare("INSERT INTO user_images (
                                            image_blob, 
                                            image_description, 
                                            image_header,
                                            image_owner) 
                                            VALUES (
                                                :base64_data, 
                                                :image_description,
                                                :image_header,
                                                :image_owner_uhm
                                            )");
        $stmt->bindParam(':base64_data', $base64);
        $stmt->bindParam(':image_description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':image_header', $myheader, PDO::PARAM_STR);
        $stmt->bindParam(':image_owner_uhm', $owner, PDO::PARAM_STR);

        $stmt->execute();
        
        TESTING INSERT. REMOVE LATER <<<END>>>  */  

        // this is to read an image blob from the database
        // when using BLOB data type

        if ($useblob) {
            $stmt = $conn->prepare("SELECT image_blob, image_description, image_header, image_owner FROM user_images");
            $stmt->execute();
        } 
        else {
            $stmt = $conn->prepare("SELECT image_URI, image_description, image_header, image_owner FROM user_images");
            $stmt->execute();
        }

        // go through the data in the row and present and convert where needed
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<p>Uploaded by: '.$result["image_owner"].'</p>';
            
            echo '<p>'.$result["image_header"].'</p>';

            // when using BLOB data type
            if ($useblob) {
                echo '<img src="' . $result["image_blob"] . '"/>'; // this made me crosseyed
            }
            else {
                echo '<img src="images/' . $result["image_URI"] . '"/>';
            }

            echo '<p>'.$result["image_description"].'</p>';

            echo '<hr>';
        }

        // Reference
        // $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        // echo '<img src="data:image/jpg;base64,' . $duh . '" />';
        
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    } finally {
        $conn = null;
    }
}
else {
    header("Location: index.php?error=nologindetected");
    exit();
}
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="imagefeed.css">
        <link rel="stylesheet" type="text/css" href="header.css">
        <meta charset="utf-8">
        <meta name="description" content="test meta description">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title>imagefeed</title>
    </head>
</html>