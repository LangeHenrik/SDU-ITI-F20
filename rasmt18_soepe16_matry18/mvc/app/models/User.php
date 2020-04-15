<?php
class User extends Database
{

    public function login($username, $password)
    {

        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        $sql = "SELECT username, password, user_id FROM user WHERE username = :username";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $result = $stmt->fetch(); //fetchAll to get multiple rows
        if ($result['username'] == $username && password_verify($password, $result['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $result['user_id'];
            return true;
        }
        return false;
    }

    public function register($username, $password, $passwordVerify)
    {
        //print_r($_POST);
        if ($password !== $passwordVerify) {
            return false;
        }

        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        $passwordVerify = filter_var($passwordVerify, FILTER_SANITIZE_STRING);

        $password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            if($stmt->execute()){
                return "You have succesfully created an account";
            }

        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }

    }

    public function list() {
        $sql = "SELECT username, user_id FROM user";
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC); //for at få associative array
        $stmt->execute();
        return $stmt->fetchAll();
    }
}