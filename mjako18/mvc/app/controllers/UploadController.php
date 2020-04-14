<?php

class UploadController extends Controller {
  public function index ($param) {
    $viewbag["Title"] = "Upload image";
    $viewbag["currentPage"] = "upload";
    $viewbag["inside"] = $this->model('Account')->isLoggedin();
var_dump($viewbag);
    $this->view("upload/index", $viewbag);
	}

  public function saveImage() {
    $return = array();

    $caption = filter_input(INPUT_POST, "caption", FILTER_SANITIZE_ENCODED);
    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_ENCODED);

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($_FILES["image"]["tmp_name"]);
    $allowed = array('bmp' => 'image/bmp', 'gif' => 'image/gif', 'jpg'=>'image/jpeg', 'png' => 'image/png', 'webp' => 'image/webp');
    if(false === $ext = array_search($mime, $allowed, true)) {
      $return += ["error" => "Wrong file type. Only these types of images are allowed: bmp, gif, jpg, png, webp"];
    } else {
      switch($mime) {
        case "image/bmp":
          if(!$img = @imagecreatefrombmp($_FILES["image"]["tmp_name"])) {
            $return += ["error" => "Wrong file type. Only these types of images are allowed: bmp, gif, jpg, png, webp"];
          }
          break;
        case "image/gif":
          if(!$img = @imagecreatefromgif($_FILES["image"]["tmp_name"])) {
            $return += ["error" => "Wrong file type. Only these types of images are allowed: bmp, gif, jpg, png, webp"];
          }
          break;
        case "image/jpeg":
          if(!$img = @imagecreatefromjpeg($_FILES["image"]["tmp_name"])) {
            $return += ["error" => "Wrong file type. Only these types of images are allowed: bmp, gif, jpg, png, webp"];
          }
          break;
        case "image/png":
          if(!$img = @imagecreatefrompng($_FILES["image"]["tmp_name"])) {
            $return += ["error" => "Wrong file type. Only these types of images are allowed: bmp, gif, jpg, png, webp"];
          }
          break;
        case "image/webp":
          if(!$img = @imagecreatefromwebp($_FILES["image"]["tmp_name"])) {
            $return += ["error" => "Wrong file type. Only these types of images are allowed: bmp, gif, jpg, png, webp"];
          }
          break;
      }
    }
    
    if(empty($return["error"])) {
      $base_img_dir = "./uploads";
      if(!is_dir($base_img_dir)) {
        mkdir($base_img_dir);
      }
      $filename = sha1_file($_FILES["image"]["tmp_name"]).$ext;
      
      $targetFilePath = $base_img_dir ."/". $_SESSION['name'] ."/". $filename;

      if(!is_dir($base_img_dir ."/". $_SESSION['name'])) {
        mkdir($base_img_dir ."/". $_SESSION['name']);
      }
      if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        $inserted = $this->model('Gallery')->saveImage($caption, $description, $targetFilePath);
        if($inserted) {
          $return += ["success" => "File ". $filename ." has been uploaded."];
        } else {
          $return += ["error" => "Failed to save to database. Please try again."];
        }
      } else {
        $return += ["error" => "Failed to upload file ". $filename .". Please try again."];
      }
    }  
    echo json_encode($return);
  }
}
