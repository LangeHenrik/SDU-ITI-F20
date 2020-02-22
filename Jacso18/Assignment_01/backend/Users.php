<?php 

class Users extends Dbh {
    
    public function setUser($email, $password, $name){
        $sql ="INSERT INTO users (email, password, name) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email,$password,$name]);
    }
}