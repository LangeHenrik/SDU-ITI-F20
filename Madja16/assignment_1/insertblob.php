<?php

require_once "dbh.inc.php";

try {
        $conn = new PDO("mysql:host=$servername;dbname=$dBName", $dBUsername, $dBPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $path = 'what.jpg'; // image in server root
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path); // data to encode
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data); // string to save in BLOB

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

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    } finally {
        $conn = null;
    }

?>