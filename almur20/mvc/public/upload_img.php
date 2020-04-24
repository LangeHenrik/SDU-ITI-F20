<?php
    $target_dir = "./user_images/";
    $target_file = $target_dir . basename($_FILES["input_img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //var_dump($target_file);
    $check = getimagesize($_FILES["input_img"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $status_message = 'No compatible file (only JPG, JPEG, PNG or GIF).';
        $uploadOk = 0;
    }

    // Check if file already exists
    while (file_exists($target_file)) {
        $target_file = './user_images/a' . substr($target_file, 14); //12
    }

    // Check file size
    if ($_FILES["input_img"]["size"] > 500000) {
        $status_message = 'File size exceeds the maximum.';
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $status_message = 'No compatible file (only JPG, JPEG, PNG or GIF).';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $status_message = 'Error uploading the file. ' . $status_message;
    // if everything is ok, try to upload file
    } else {
        //echo $_FILES["input_img"]["tmp_name"];
        if (move_uploaded_file($_FILES["input_img"]["tmp_name"], $target_file)) {
            $image_uploaded = true;
            //echo "The file ". basename( $_FILES["input_img"]["name"]). " has been uploaded.";
            $status_message = '';
        } else {
            $status_message = 'Error uploading the file.';
        }
    }

    $_SESSION['status_message'] = $status_message;
?>