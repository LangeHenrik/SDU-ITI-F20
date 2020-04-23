<?php
class Post extends Database
{
    public function newPost($id, $title, $description, $image, $encode_image = true){
        if ($encode_image){
            $image = base64_encode($image);
        }
        $this->query('INSERT INTO post (user_id, title, description, image) VALUES (?, ?, ?, ?);', [$id, $title, $description, $image]);

        return $this->conn->lastInsertId();
    }

    public function getUserPosts($userID){
        $posts = $this->query('SELECT * FROM post WHERE user_id = ?;', [$userID]);
        foreach ($posts as $post){
            $post['image'] = base64_decode($post['image']);
        }
        //header('Content-Type: image/jpeg');
        return $posts;
    }

    public function allPosts(){
        $posts = $this->query('SELECT username, avatar, title, description, image, post.created_on
                   FROM user INNER JOIN post ON user.user_id = post.user_id 
                   ORDER BY post.created_on DESC;');

        foreach ($posts as $post){
            if ($post['avatar'] != null){
                $post['avatar'] = base64_decode($post['avatar']);
            }
            $post['image'] = base64_decode($post['image']);


        }
        return $posts;
    }
}