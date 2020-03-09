<?php
  require_once "./config.php";
  include_once './image_class.php';

  $image_obj = new image();
  $result = $image_obj->getImageList();
  foreach($result as &$value) {
    $value['caption'] = urldecode($value['caption']);
    $value['description'] = urldecode($value['description']);
  }
