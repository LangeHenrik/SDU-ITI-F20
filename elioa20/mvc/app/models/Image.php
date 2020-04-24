<?php

class Image extends Database
{
    public function upload($imageBlob, $imageHeader, $imageDescription, $userUploading)
    {

        $sql = 'CALL InsertImage(:image_blob,:header,:description,:uploadtime,:username)';

        $stmt = $this->conn->prepare($sql);

        $datetime = date("Y-m-d H:i:s");

        $imageHeader = htmlspecialchars($imageHeader);
        $imageDescription = htmlspecialchars($imageDescription);

        // pass value to the command
        $stmt->bindParam(':image_blob', $imageBlob, PDO::PARAM_STR, PHP_INT_MAX);
        $stmt->bindParam(':header', $imageHeader, PDO::PARAM_STR, 200);
        $stmt->bindParam(':description', $imageDescription, PDO::PARAM_STR, 200);
        $stmt->bindParam(':uploadtime', $datetime, PDO::PARAM_STR);
        $stmt->bindParam(':username', $userUploading, PDO::PARAM_STR);

        // execute the stored procedure
        $stmt->execute();

        $result = $stmt->fetchAll();

        return ["image_id" => $result[0]['LAST_INSERT_ID()']];
    }

    public function getAll()
    {
        $sql = 'CALL GetImages()';

        // prepare for execution of the stored procedure
        $stmt = $this->conn->prepare($sql);

        // execute the stored procedure
        $stmt->execute();

        $stmt->closeCursor();

        $row = $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $ok = false;
        $messages = [];

        if ($row) {
            $ok = true;
            foreach ($row as $image) {
                $messages[] = $image;
            }
        }

        return array("ok"=>$ok,"messages"=>$messages);
    }

    public function getUserImages($username)
    {
        $username = htmlspecialchars($username);

        $sql = 'CALL GetUserImages(:username)';

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR, 45);

        $stmt->execute();

        $result = $stmt->fetchAll();

        $userImages = [];

        foreach ($result as $userImage) {
            $image = [];
            $image["image"] = $userImage['image_blob'];
            $image["title"] = $userImage['header'];
            $image["description"] = $userImage['description'];
            $image["user"] = $userImage['username'];
            $image["uploaded_time"] = $userImage['uploadTime'];
            array_push($userImages, $image);
        }
        return $userImages;
    }

}