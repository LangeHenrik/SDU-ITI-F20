<?php
class image {
  public function saveImage($caption, $description, $image) {
    $db = getDB();
    $sql = "INSERT INTO image(caption, description, image_name, user_id) VALUES(:caption, :description, :image, :uid);";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':caption', $caption);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':uid', $_SESSION["AccountID"]);
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
    $sql = "SELECT * FROM image WHERE id = :image_id;";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':image_id', $image_id);
    $stmt->execute();
    $returnVal = $stmt->fetch(PDO::FETCH_ASSOC);
    $db = null;
    return $returnVal;
  }

  public function getImageList() {
    $db = getDB();
    $sql = "SELECT caption, description, image_name, username FROM image, account WHERE account.id = user_id;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $returnVal = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $db = null;
    return $returnVal;
  }
}
