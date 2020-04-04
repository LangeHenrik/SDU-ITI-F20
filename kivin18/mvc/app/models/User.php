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
        return $username == $result['username'] && password_verify($password, $result['password']);
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