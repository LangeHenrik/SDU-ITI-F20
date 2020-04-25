<?php

class UploadController extends Controller {
  public function index ($param) {
    $viewbag["Title"] = "Upload image";
    $viewbag["currentPage"] = "upload";
    $viewbag["inside"] = $this->model('Account')->isLoggedin();
    $this->view("upload/index", $viewbag);
	}
/* MOVED TO SERVICE? */
  public function saveImage() {
    $return = $this->model('Gallery')->saveImage();//$caption, $description, $targetFilePath
    echo json_encode($return);
  }
}
