<?php
//  header("Content-Type: application/json; charset=UTF-8");

  require_once "./config.php";
  include_once './image_class.php';

  $image_obj = new image();
  $result = $image_obj->getImageList();
  foreach($result as &$value) {
    $value['caption'] = urldecode($value['caption']);
    $value['description'] = urldecode($value['description']);
  }
  echo json_encode($result);
