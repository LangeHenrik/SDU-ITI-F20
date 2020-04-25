<?php
class Picture extends Database
{

    public function getPicture($user_id)
    {
        $stmt = $this->conn->prepare("SELECT a.picture, a.header, a.description FROM 
        (SELECT * FROM user  INNER JOIN picture  ON username = uploader) AS a WHERE a.user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
    
        return $result;
        
    }

    public function postPictures($picture, $header, $description, $uploader) 
    {
        $stmt = $this->conn->prepare("INSERT INTO picture (picture, header, description, uploader) 
        VALUES (:picture, :header, :description, :uploader)");
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':header', $header);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':uploader', $uploader);
        $stmt->execute();

        $last_id = $this->conn->lastInsertId();

        return $last_id;



    }





}
