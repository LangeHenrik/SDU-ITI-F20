<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image_header = filter_var($_POST["image-header"], FILTER_SANITIZE_STRING);
    $image_description = filter_var($_POST["image-description"], FILTER_SANITIZE_STRING);

    $regex = "/^.+$/";
    if (!preg_match($regex, $image_header)
    || !preg_match($regex, $image_description)
    || !isset($_FILES["fileToUpload"]["name"])) {
        $error_message = "Missing inputs! All fields are required.";
        return;
    }

    $file = basename($_FILES["fileToUpload"]["name"]);
    $filetype = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $file_content = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check === false) {
            $error_message =  "File is not an image.";
            return;
        }
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $error_message =  "Sorry, your file is too large.";
        return;
    }

    if ($filetype != "jpg"
    && $filetype != "png"
    && $filetype != "jpeg"
    && $filetype != "gif") {
        $error_message =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        return;
    }

    $success_message =  'Image uploaded succesfully!<br><img src="'
    .encode_and_save_image($file_content, $filetype, $image_header, $image_description)
    .'"/><br>Header: '. $image_header
    .'<br>Description: ' . $image_description;
}

function encode_and_save_image($content, $filetype, $image_header, $image_description)
{
    $encoded_image = 'data:image/' . $filetype . ';base64,' . base64_encode($content);
    $current_user = $_SESSION['current_user'];
    upload_post($encoded_image, $image_header, $image_description, $current_user);
    return $encoded_image;
}
