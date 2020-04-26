<?php

class User extends Database
{


    public function userLogin()
    {
        if (isset($_POST['loginUsername'])) {

            $user = htmlspecialchars($_POST['loginUsername']);
            $pass = htmlspecialchars($_POST['loginPassword']);

            if (empty($user) || empty($pass)) {
                echo 'All field are required';
            } else {
                $query = $this->conn->prepare("SELECT username, password FROM users WHERE
username=? ");

                $query->execute(array($user));
                $row = $query->fetch(PDO::FETCH_BOTH);

                $userFromDb = filter_var($row['username'], FILTER_SANITIZE_STRING);
                $pwFromDb = filter_var($row['password'], FILTER_SANITIZE_STRING);

                if ($user === $userFromDb && password_verify($pass, $pwFromDb) && $query->rowCount() > 0) {
                    $_SESSION['username'] = $user;
                    $_SESSION['logged_in'] = true;

                    return true;

                } else {
                    echo "Wrong username or password";
                    return false;
                }
            }
        }

    }

    //For web page
    public function getAllUsers()
    {
        $sql = "SELECT username,email FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    //For API
    public function getUserNamesAndIDs()
    {
        $sql = "SELECT user_id,username FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function validateUsers($username, $password) {
        $sqlStmt = $this->conn->prepare("SELECT user_id, password FROM users WHERE username = :username");
        $sqlStmt->bindparam(':username', $username);
        $sqlStmt->execute();
        $sqlStmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $sqlStmt->fetchAll();
        if (password_verify($password, $result[0]['password'])) {
            return $result[0]['user_id'];
        } else {
            return 'error';
        }
    }

}