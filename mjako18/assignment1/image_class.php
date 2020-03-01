<?php
class image {
  public function saveImage($caption, $description, $image) {
    $db = getDB();
    $sql = "INSERT INTO images(caption, description, image_name) VALUES(:caption, :description, :image)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':caption', $caption);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->execute();
    if($stmt->rowCount() > 0) {
      $returnVal = true;
    } else {
      $returnVal = false;
    }
    $db = null;
    return $returnVal;
  }

  public function getImage($image_id) {
    $db = getDB();
    $sql = "SELECT * FROM images WHERE id = :image_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':image_id', $image_id);
    $stmt->execute();
    $returnVal = $stmt->fetch(PDO::FETCH_ASSOC);
    $db = null;
    return $returnVal;
  }

  public function getImageList() {
    $db = getDB();
    $sql = "SELECT caption, description, CONCAT('uploads/". $_SESSION['name'] ."/', image_name) as image_name FROM images";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $returnVal = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $db = null;
    return $returnVal;
  }
}
