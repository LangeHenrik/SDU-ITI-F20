<?php
class Post extends Database
{
    public function newPicPost($header, $description, $username, $picture){
        if($header === ''){
            echo $header;
            echo $description;
            echo $username;
            echo $picture;
            echo "This is an error catching thing";
            return false;
        }

        $insert = $this->conn->prepare("INSERT into pictures (header, description, user, picture) VALUES (?, ?, ?, ?)");
        $insert->bindParam(1, $header);
        $insert->bindParam(2, $description);
        $insert->bindParam(3, $username);
        $insert->bindValue(4, $picture);
        if ($insert->execute()) {
            echo "File uploaded successfully.";
            header("Location: ../home");
            exit;
        } else {
            echo "File upload failed, please try again.";
        }
        return $this->conn->lastInsertId();
    }

    public function getActualPictures() {
        $posts = $this->conn->prepare('SELECT header, description, user, picture FROM pictures;');
        $posts->execute();
        $content = [];
        while ($row = $posts->fetch()) {
            array_push($content, $row);
        }
        return $content;
    }
    public function getPictures() {
        $posts = $this->conn->prepare('SELECT picture as image, header as title, description FROM pictures;');
        $posts->execute();
        $content = [];
        while ($row = $posts->fetch()) {
            $temp = $row['image'];
            $row['image'] = "data:image/jpeg;base64," . $temp;
            array_push($content, $row);
        }
        return $content;
    }
}
