<?php

class Image extends Database
{

    public function upload()
    {
        $target_file = $_FILES["image"]["name"];
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = true;
            } else {
                echo "File is not an image.";
                $uploadOk = false;
            }
        }
        // Check file size (max 2 MB)
        if ($_FILES["image"]["size"] > 2000000) {
            echo "Your file is too large.";
            $uploadOk = false;
        }

        // Check file type
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "jfif") {
            echo "Only JPG, JPEG, PNG & JFIF files are allowed.";
            $uploadOk = false;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "File already exists.";
            $uploadOk = false;
        }

        if ($uploadOk) {
            $stmt = $this->conn->prepare('INSERT INTO image(username, image, title, description) VALUES (?, ?, ?, ?)');
            $image = file_get_contents($_FILES["image"]["tmp_name"]);
            $header = htmlentities($_POST["imageHeader"]);
            $description = htmlentities($_POST["description"]);
            if ($image === false) {
                return false;
            }
            $stmt->execute([$_SESSION["user"], $image, $header, $description]);
            return true;
        } else {
            return false;
        }

    }

    public function getImages()
    {
        $stmt = $this->conn->prepare('SELECT username, image, title, description, date_added FROM image ORDER BY image_id DESC');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getApiImages($id)
    {
        $stmt = $this->conn->prepare('SELECT image, title, description FROM image INNER JOIN user ON image.username = user.username WHERE user_id = ? ORDER BY image_id DESC');
        $stmt->execute([$id]);
        $content = [];
        while ($row = $stmt->fetch()) {
            $temp = $row['image'];
            $row['image'] = "data:image/jpeg;base64," . base64_encode($temp);
            array_push($content, $row);
        }
        return $content;
    }

    public function postApiImage()
    {
        $stmt = $this->conn->prepare('INSERT INTO image(username, image, title, description) VALUES (?, ?, ?, ?)');
        $json = json_decode($_POST['json']);
        $username = htmlentities($json->username);
        $image = file_get_contents($json->image);
        $header = htmlentities($json->title);
        $description = htmlentities($json->description);
        $stmt->execute([$username, $image, $header, $description]);
        $response = $this->conn->query('SELECT LAST_INSERT_ID()');
        return $response->fetch()['LAST_INSERT_ID()'];
    }


}
