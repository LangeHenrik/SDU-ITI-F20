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
            $stmt = $this->conn->prepare('INSERT INTO image(username, image, header, description) VALUES (?, ?, ?, ?)');
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
        $stmt = $this->conn->query('SELECT username, image, header, description, date_added FROM image ORDER BY image_id DESC');
        $content = [];
        while ($row = $stmt->fetch()) {
            $image['username'] = $row['username'];
            $image['header'] = $row['header'];
            $image['description'] = $row['description'];
            $image['image'] = $row['image'];
            $image['date_added'] = $row['date_added'];
            array_push($content, $image);
        }
        return $content;
    }

}
