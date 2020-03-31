<?php
$dbFile = '/Users/signethuesenpedersen/Documents/SDU-ITI-F20/siped18/mvc/app/core/Database.php';
require_once $dbFile;
class User extends Database
{
    public function login($username, $password)
    {
        $sql = "SELECT username AND uPassword FROM users WHERE username = :username";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $result = $stmt->fetch(); //fetchAll to get multiple rows

        return $result;
    }

    public function getAll()
    {
        $sql = "SELECT username  FROM users";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

    public function checkLogin($username, $password) 
    {
    
        $sql = "SELECT uPassword FROM users WHERE username = :username";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $result = $stmt->fetch();

        if(isset($result))
        {
            return password_verify($password, $result);

        } else {
            return false;
        }
    }
}
