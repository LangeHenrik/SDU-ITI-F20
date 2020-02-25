<?php 

class Users extends Dbh {
    
    public function setUser($username, $email, $password){
        $sql ="INSERT INTO users (username, email, password) VALUES (?,?,?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username,$email,$password]);
    }

    public function getUserFromUsername($username){
        $sql ="SELECT * FROM users WHERE username= ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function savePost($username, $image, $comment){
        $sql ="INSERT INTO posts (user_id, image, COMMENT) VALUES ((SELECT user_id FROM users WHERE username= ? ),?,?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username,$image,$comment]);
    }

    public function getPosts(){
        $sql ="SELECT username, image, COMMENT, timestamp FROM users, posts WHERE posts.user_id = users.user_id ORDER BY timestamp DESC;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
}