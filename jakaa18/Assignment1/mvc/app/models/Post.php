<?php
class Post extends Database
{
    public function newPicPost($header, $description, $username, $picture, $encode_image = true){
        if ($encode_image) {
            $picture = base64_encode($picture);
        }
        $insert = $this->conn->prepare("INSERT into pictures (header, description, user, picture) VALUES (?, ?, ?, ?)");
        $insert->bindParam(1, htmlspecialchars($header));
        $insert->bindParam(2, htmlspecialchars($description));
        $insert->bindParam(3, htmlspecialchars($username));
        $insert->bindParam(4, $imgContent, PDO::PARAM_LOB);
        if ($insert->execute()) {
            echo "File uploaded successfully.";
            header("Location: index.php");
            exit;
        } else {
            echo "File upload failed, please try again.";
        }
        return $this->conn->lastInsertId();
    }

    public function getPictures() {
        $posts = $this->query('SELECT user, picture FROM pictures;');
        foreach ($posts as $post){
            $post['picture'] = base64_decode($post['picture']);
        }
    }
}
