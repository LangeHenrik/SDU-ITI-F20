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
        return ($username == $result['username'] && password_verify($password, $result['password']));
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

    public function getUsers()
    {
        $sql = "SELECT username, join_date FROM user";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getUserIdAndName() {
        $sql = "SELECT user_id, username FROM user";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function apiUserId() {
        $json = json_decode($_POST['json']);
        if ($this->login($json->username, $json->password)) {
            $sql = "SELECT user_id FROM user WHERE username = :username";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $json->username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result['user_id'];
        }
    }


}
