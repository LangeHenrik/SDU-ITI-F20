<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    $name = basename($_FILES["fileToUpload"]["name"]);
    $header = $_POST["header"];
    $description = $_POST["description"];

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        //    if everithing is ok, try to upload name, header, description to the database


        // Include config file
        require_once "config.php";


        // Validate username
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter a name.";
        } else {
            // Prepare a select statement
            $sql = "SELECT id FROM upload_image WHERE name = :name";

            if ($stmt = $pdo->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(":name", $name, PDO::PARAM_STR);

                // Set parameters
                $param_name = trim($name);

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    if ($stmt->rowCount() == 1) {
                        $name_err = "This name is already taken.";
                    } else {
                        $name = trim($_POST["name"]);
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                unset($stmt);
            }
        }

        // Check input errors before inserting in database
        if (empty($name_err)) {

            // Prepare an insert statement
            $sql = "INSERT INTO upload_image (name, header, description) VALUES (:name, :header, :description)";

            if ($stmt = $pdo->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
                $stmt->bindParam(":header", $header, PDO::PARAM_STR);
                $stmt->bindParam(":description", $description, PDO::PARAM_STR);

                // Set parameters
                $param_name = $name;

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Redirect to login page
                    //                header("location: login.php");
                } else {
                    echo "Something went wrong. Please try again later.";
                }

                // Close statement
                unset($stmt);
            }
        }

        // Close connection
        unset($pdo);


    }
}

//header('Location: ' . $_SERVER['HTTP_REFERER']);
//exit;


?>