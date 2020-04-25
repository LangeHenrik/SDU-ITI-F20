<?php
class Picture extends Database
{

    function getImagePosts()
    {
        $stmt = $this->conn->prepare("SELECT * FROM picture");

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function getPicture($user_id)
    {
        $stmt = $this->conn->prepare("SELECT a.image_id, a.title, a.description, a.image FROM 
        (SELECT * FROM user  INNER JOIN picture  ON username = uploader) AS a WHERE a.user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function postPicture($image, $title, $description, $uploader)
    {
        $stmt = $this->conn->prepare("INSERT INTO picture (image, title, description, uploader) 
        VALUES (:image, :title, :description, :uploader)");
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':uploader', $uploader);
        $stmt->execute();

        $last_id = $this->conn->lastInsertId();

        return $last_id;
    }
}
