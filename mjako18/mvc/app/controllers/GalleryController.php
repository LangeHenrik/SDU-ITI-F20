<?php

class GalleryController extends Controller {
  public function index ($param) {
    $viewbag["Title"] = "Image gallery";
    $viewbag["currentPage"] = "gallery";
    $viewbag["inside"] = $this->model('Account')->isLoggedin();
    $this->view("gallery/index", $viewbag);
	}

  public function imagelist() {
    $return = $this->model('Gallery')->getImageList();
    foreach($return as &$value) {
      $value['caption'] = urldecode($value['caption']);
      $value['description'] = urldecode($value['description']);
    }
    header("Content-Type: application/json; charset=UTF-8");

    echo json_encode($return);
  }

  public function getImage($imageID) {
    $return = $this->model('Gallery')->getImage($imageID);
    $viewbag["caption"] = $return["caption"];
    $viewbag["description"] = $return["description"];
    $viewbag["image_name"] = $return["image_name"];
    $img = $return["image_name"];
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $viewbag["mimetype"] = $finfo->file($img);
    $viewbag["img"] = base64_encode(file_get_contents($img));
    $viewbag["user_id"] = $return["user_id"];
    $this->view("gallery/getImage", $viewbag);
  }
}
