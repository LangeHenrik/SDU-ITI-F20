<?php
class Post extends Database
{
    public function newPicPost($header, $description, $username, $picture, $encode_image = true){
        if ($encode_image) {
            $picture = base64_encode($picture);
        }
        $this->query('INSERT INTO pictures (header, description, user, picture) VALUES (?, ?, ?, ?, ?);', [$header, $description, $username, $picture]);

        return $this->conn->lastInsertId();
    }

    public function getPictures() {
        $posts = $this->query('SELECT user, picture FROM pictures ORDER BY pictures.created_on DESC;');
        foreach ($posts as $post){
            $post['picture'] = base64_decode($post['picture']);
        }
    }
}