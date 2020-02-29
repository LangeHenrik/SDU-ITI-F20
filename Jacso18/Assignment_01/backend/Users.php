<?php 

class Users extends Dbh {
    
    public function setUser($username, $email, $password){
        $stmt =$this->connect()->prepare("INSERT INTO users (username, email, password) VALUES (:username,:email,:password);");
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
    }

    public function getUsers(){
        $sql ="SELECT username, email FROM users;";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getUserFromUsername($username){
        $stmt =$this->connect()->prepare("SELECT * FROM users WHERE username = :username;");
        $stmt->bindParam(':username',$username);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function savePost($username, $title, $image, $comment){
        $stmt =$this->connect()->prepare("INSERT INTO posts (user_id, title, image, COMMENT) VALUES ((SELECT user_id FROM users WHERE username= :username ),:title,:image,:comment);");
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':title',$title);
        $stmt->bindParam(':image',$image);
        $stmt->bindParam(':comment',$comment);
        $stmt->execute();
    }

    public function getPosts(){
        $sql ="SELECT username, title, image, COMMENT, timestamp FROM users, posts WHERE posts.user_id = users.user_id ORDER BY timestamp DESC;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getPostsAJAX($username){
        $stmt ="SELECT username, title, image, COMMENT, timestamp FROM users, posts WHERE posts.user_id = users.user_id AND username LIKE '%:username%' ORDER BY timestamp DESC;";
        $stmt->bindParam(':username',$username);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
}