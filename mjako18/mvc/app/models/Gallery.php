<?php
class Gallery extends Database {
  private $allowed = array('bmp' => 'image/bmp', 'gif' => 'image/gif', 'jpeg'=>'image/jpeg', 'png' => 'image/png', 'webp' => 'image/webp');

  public function saveImage() {
  
    $returnVal = [];
  
    $caption = filter_input(INPUT_POST, "caption", FILTER_SANITIZE_ENCODED);
    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_ENCODED);

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($_FILES["image"]["tmp_name"]);
    
    // Check the mimetype is allowed.
    if(false === $ext = array_search($mime, $this->allowed, true)) {
      $returnVal["error"][] = "Wrong file type. Only these types of images are allowed: bmp, gif, jpg, png, webp";
    } else {
    // Check if file is actual image.
      switch($mime) {
        case "image/bmp":
          if(!$img = @imagecreatefrombmp($_FILES["image"]["tmp_name"])) {
            $returnVal["error"][] = "Wrong file type. Only these types of images are allowed: bmp, gif, jpg, png, webp";
          }
          break;
        case "image/gif":
          if(!$img = @imagecreatefromgif($_FILES["image"]["tmp_name"])) {
            $returnVal["error"][] = "Wrong file type. Only these types of images are allowed: bmp, gif, jpg, png, webp";
          }
          break;
        case "image/jpeg":
          if(!$img = @imagecreatefromjpeg($_FILES["image"]["tmp_name"])) {
            $returnVal["error"][] = "Wrong file type. Only these types of images are allowed: bmp, gif, jpg, png, webp";
          }
          break;
        case "image/png":
          if(!$img = @imagecreatefrompng($_FILES["image"]["tmp_name"])) {
            $returnVal["error"][] = "Wrong file type. Only these types of images are allowed: bmp, gif, jpg, png, webp";
          }
          break;
        case "image/webp":
          if(!$img = @imagecreatefromwebp($_FILES["image"]["tmp_name"])) {
            $returnVal["error"][] = "Wrong file type. Only these types of images are allowed: bmp, gif, jpg, png, webp";
          }
          break;
      }
    }
  
    if(empty($returnVal["error"])) {
      $targetFilePath = $this->createFilePath($_FILES["image"]["tmp_name"], $ext, true);
      $orgFilename = $_FILES["image"]["name"];
      if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {

        $insertId = $this->saveImageToDatabase($caption, $description, $targetFilePath);
        if($insertId > 0) {
          $returnVal["success"] = "File {$orgFilename} has been uploaded.";
        } else {
          $returnVal["error"][] = "Failed to save to database. Please try again.";
        }
      } else {
        $returnVal["error"][] = "Failed to upload file ". $orgFilename .". Please try again.";
      }
    }
    return $returnVal;
  }
  
  private function saveImageToDatabase($caption, $description, $image) {
    $sql = "INSERT INTO image(caption, description, image_name, user_id) VALUES(:caption, :description, :image, :uid);";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':caption', $caption);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':uid', $_SESSION["AccountID"]);
    $stmt->execute();
    return $this->conn->lastInsertId();
  }
  
  public function saveImageAPI($json) {
    $returnVal = [];
    $targetFilePath = "";
    $bin = base64_decode($json->image);
    $size = getImageSizeFromString($bin);

    if (empty($size['mime']) || strpos($size['mime'], 'image/') !== 0) {
      $returnVal["error"][] = "base64 string is not a valid image.";
    } else {
      $img = imageCreateFromString($bin);
      
      if(false === $ext = array_search($size["mime"], $this->allowed, true)) {
        $returnVal["error"][] = "Wrong file type. Only these types of images are allowed: bmp, gif, jpg, png, webp";
      } else {
        $tmpName = "image".$json->username.time();
        $targetFilePath = $this->createFilePath($tmpName, $ext, false);
        
        $imgArgs = [$img, $targetFilePath];
        if($ext == "png") {
          $imgArgs[] = 0;
        } else if($ext == "jpeg" || $ext == "webp") {
          $imgArgs[] = 100;
        }
        $fn = "image{$ext}";
        call_user_func_array($fn, $imgArgs);
        
        $insertId = $this->saveImageToDatabase($json->title, $json->description, $targetFilePath);
        return array("image_id" => $insertId);
      }
      
      imagedestroy($img);
    }
  
    return $returnVal;
  }
  
  private function createFilePath(&$tmpName, $ext, $file) {
    $base_img_dir = "./uploads";
    if(!is_dir($base_img_dir)) {
      mkdir($base_img_dir);
    }
    if(!is_dir($base_img_dir ."/". $_SESSION['name'])) {
      mkdir($base_img_dir ."/". $_SESSION['name']);
    }
    if($file) {
      $filename = sha1_file($tmpName);
    } else {
      $filename = sha1($tmpName);
    }
    $filename.= ".".$ext;
    
    $targetFilePath = $base_img_dir ."/". $_SESSION['name'] ."/". $filename;
    
    return $targetFilePath;
  }

  public function getImage($image_id) {
    $sql = "SELECT * FROM image WHERE id = :image_id;";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':image_id', $image_id);
    $stmt->execute();
    $returnVal = $stmt->fetch(PDO::FETCH_ASSOC);
    return $returnVal;
  }

  public function getImageList() {
    $sql = "SELECT caption, description, image_name, username FROM image, account WHERE account.id = user_id;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $returnVal = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $returnVal;
  }

  public function getUserImageList($user_id) {
    $sql = "SELECT image_name as image, caption as title, description FROM image, account WHERE account.id = user_id AND account.id = :userID;";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':userID', $user_id);
    $stmt->execute();
    $returnVal = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $returnVal;
  }
}
