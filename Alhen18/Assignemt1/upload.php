<?php
  header("Content-Type: application/json; charset=UTF-8");

  require_once "./config.php";
  include_once './image_class.php';

  $image_obj = new image();

  $return = array();

  $caption = filter_input(INPUT_POST, "caption", FILTER_SANITIZE_ENCODED);
  $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_ENCODED);

  $base_img_dir = "./uploads";
  if(!is_dir($base_img_dir)) {
    mkdir("./uploads");
  }
  $filename = basename($_FILES["image"]["name"]);

  $targetFilePath = $base_img_dir ."/". $_SESSION['name'] ."/". $filename;

  if(!is_dir($base_img_dir ."/". $_SESSION['name'])) {
    mkdir($base_img_dir ."/". $_SESSION['name']);
  }
  if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
    $inserted = $image_obj->saveImage($caption, $description, $targetFilePath);
    if($inserted) {
      $return += ["success" => "File ". $filename ." has been uploaded."];
    } else {
      $return += ["error" => "Failed to save to database. Please try again."];
    }
  } else {
    $return += ["error" => "Failed to upload file ". $filename .". Please try again."];
  }

  echo json_encode($return);
