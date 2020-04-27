<?php
class Image extends Database {
    public function getAll () {
        $sql = "SELECT img, title, username, description FROM photo NATURAL JOIN user ORDER BY imgID DESC;";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getAllFromID ($userID) {
        $sql = "SELECT img, title, description FROM photo WHERE userID = ? ORDER BY imgID DESC;";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$userID]);

        return $stmt->fetchAll();
    }

    public function upload ($user , $title, $description, $base64) {
        $sql = "INSERT INTO photo SET userID=?, title=?, description=?, img=?;";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user, $title, $description, $base64]);

        $sql = "SELECT MAX(imgID) AS image_id FROM photo WHERE userID = ?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user]);
        return $stmt->fetch();
    }
}