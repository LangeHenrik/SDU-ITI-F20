<?php
class Gallery extends Database {
  public function saveImage($caption, $description, $image) {
    $sql = "INSERT INTO image(caption, description, image_name, user_id) VALUES(:caption, :description, :image, :uid);";
    $stmt = $this->conn->prepare($sql);
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
    return $returnVal;
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
