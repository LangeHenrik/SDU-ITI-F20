<?php


class Pictures extends Database
{

    public function APIUploadPicture($image, $header, $description, $userID) {
        $userName = $this->getUserNameFromID($userID);

        $query = "INSERT INTO imagesblob (name,user,description,title,image) VALUES(:name,:user,:description,:header,:image)";
        $query = $this->conn->prepare($query);
        $query->bindParam(':name', $userName, PDO::PARAM_STR);
        $query->bindParam(':user', $userName, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':header', $header, PDO::PARAM_STR);
        $query->bindParam(':image', $image, PDO::PARAM_STR);

        $query->execute();

        $id = $this->conn->lastInsertId();
        return $id;
    }

    public function getPicturesFromUser($userid) {
        $userName = $this->getUserNameFromID($userid);
        $sqlStmt = $this->conn->prepare("SELECT id as image_id, title, description, image as image FROM imagesblob WHERE user = :username");
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