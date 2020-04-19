<?php


class Pictures extends Database
{

    public function APIUploadPicture($image, $header, $pictureDescInput, $userID) {
        $userName = $this->getUserNameFromID($userID);

        $query = "INSERT INTO images (name,user,description,header,image) VALUES(:name,:user,:description,:header,:image)";

        $query->bindparam(':name', $userName);
        $query->bindparam(':header', $header);
        $query->bindparam(':description', $pictureDescInput);
        $query->bindparam(':image', $image);
        $query->execute();

        $id = $this->conn->lastInsertId();
        return $id;
    }

    public function getPicturesFromUser($userid) {
        $userName = $this->getUserNameFromID($userid);
        $sqlStmt = $this->conn->prepare("SELECT id as image_id, header, description, image as image FROM imagesblob WHERE user = :username");
        $sqlStmt->bindparam(':username', $userName);
        $sqlStmt->execute();
        $sqlStmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $sqlStmt->fetchAll();
        return $result;
    }

    private function getUserNameFromID($userid) {
        $sqlStmt = $this->conn->prepare("SELECT username FROM users WHERE user_id = :userid");
        $sqlStmt->bindparam(':userid', $userid);

        $sqlStmt->execute();
        $sqlStmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $sqlStmt->fetchAll();
        $userName = $result[0]['username'];

        return $userName;
    }
}