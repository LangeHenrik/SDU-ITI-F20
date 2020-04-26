<?php

class ImageFeedblobs extends Database
{

    public function showImages() {
        $stmt = $this->conn->query("SELECT name,user, description, title, image  FROM imagesblob");
        $result = $stmt->fetchAll();
        return $result;

    }

}