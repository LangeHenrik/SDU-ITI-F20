<?php

class User extends Database
{

    public function login($username, $password)
    {
        $sql = "SELECT username, password FROM user WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch();
        return ($username == $result['username'] && $password == $result['password']);
    }

    public function register($username, $password)
    {
        $stmt = $this->conn->prepare('INSERT INTO user (username, password) VALUES (?, ?)');
        if (preg_match("/^\S\w{5,50}$/", $username) && preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/", $password)) {
            $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
            $stmt->execute([$username, $hashed_pass]);
            return true;
        } else {
            return false;
        }
    }

    public function getAll()
    {
        $sql = "SELECT username FROM user";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

}