<?php

class ImageFeedblobs extends Database
{

    public function showImages() {
        $getPictureStmt = $this->conn->prepare("SELECT name,user, description, header, image  FROM imagesblob");

        $queryExecuted = $getPictureStmt->execute();
        $getPictureStmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $getPictureStmt->fetchAll();

        return $result;
    }

}