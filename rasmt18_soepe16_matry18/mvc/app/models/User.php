<?php
class User extends Database
{

    public function login($username, $password)
    {

        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        $sql = "SELECT username, password FROM user WHERE username = :username";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $result = $stmt->fetch(); //fetchAll to get multiple rows
        if ($result['username'] == $username && password_verify($password, $result['password'])) {
            $_SESSION['username'] = $username;
            return true;
        } else {

        }
        print_r($result);


        //todo: make an actual login function!!
        return false;
    }

    public function register($username, $password, $passwordVerify)
    {
        print_r($_POST);
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
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }
}