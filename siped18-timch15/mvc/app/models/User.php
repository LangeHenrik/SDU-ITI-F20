<?php

class User extends Database
{
    public function login($username, $password)
    {
        $sql = "SELECT username AND uPassword FROM users WHERE username = :username";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $result = $stmt->fetchAll(); //fetchAll to get multiple rows

        foreach ($result as $value) {
            if ($value['username'] == $username && password_verify($password, $value['password'])) {
                return true;
            }
        }
    }

    public function getAll()
    {
        $sql = "SELECT username  FROM users";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

    public function register($firstname, $lastname, $email, $username, $password)
    {  
        $hpassword = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (firstname, lastname, username, email, username, password) VALUES (:firstname, :lastname, :email, :username, :password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hpassword);
        
        $stmt->execute();
        return true;
        }  
    }
}
