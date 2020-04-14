<?php

class User extends Database
{
    public function insertUser($username, $fullname, $email,  $password)
    {
        $insert_query = 'INSERT INTO user (username, fullname, email, password) VALUES (:username, :fullname, :email, :password)';
        $prepare_statement = $this->conn->prepare($insert_query);
        if ($prepare_statement !== false) {

            $encryptedPassword = password_hash($password, PASSWORD_BCRYPT);
            $prepare_statement->bindParam(':username', $username);
            $prepare_statement->bindParam(':fullname', $fullname);
            $prepare_statement->bindParam(':email', $email);
            $prepare_statement->bindParam(':password', $encryptedPassword);

            $queryExecute = $prepare_statement->execute([$username, $fullname, $email,  $encryptedPassword]);

            if ($queryExecute == FALSE) {
                echo 'Failure on insert';
                return false;
            } else {
                return true;
            }
        } else {
            var_dump($this->db->error);
        }
    }
    public function getUserByUsername($username)
    {

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!empty($_POST['password']) || !empty($_POST['username'])) {
            if (isset($_POST['username']) && isset($_POST['password'])) {

                $select_query = 'SELECT fullname, username, password FROM user WHERE username=:username';
                $prepare_statement = $this->conn->prepare($select_query);

                $prepare_statement->bindParam(':username', $username);
                $prepare_statement->execute([$username]);
                $query_result = $prepare_statement->fetchAll();

                if ($query_result[0]['username'] == $username && password_verify($password, $query_result[0]['password'])) {
                    return $query_result;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return null;
        }
    }

    public function getUserdataByUserID($user_id)
    {
        $select_query = 'SELECT username, fullname, email FROM user WHERE user.userid=:userID';
        $prepare_statement = $this->conn->prepare($select_query);
        if ($prepare_statement !== false) {
            $prepare_statement->bindParam(':userID', $user_id);
            $prepare_statement->execute();
            $query_result = $prepare_statement->fetchAll();
            return $query_result;
        } else {
            var_dump($this->db->error);
        }
    }
    public function getUserByID($user_id)
    {
        $select_query = 'SELECT username, password FROM user WHERE user.userid=:userID';
        $prepare_statement = $this->conn->prepare($select_query);
        if ($prepare_statement !== false) {
            $prepare_statement->bindParam(':userID', $user_id);
            $prepare_statement->execute();
            $query_result = $prepare_statement->fetchAll();
            return $query_result;
        } else {
            var_dump($this->db->error);
        }
    }
    public function getUserByUsernameAndMail($username, $email)
    {
        $select_query = 'SELECT * FROM user WHERE username=:username AND email=:email';
        $prepare_statement = $this->conn->prepare($select_query);
        if ($prepare_statement !== false) {
            $prepare_statement->bindParam(':username', $username);
            $prepare_statement->bindParam(':email', $email);
            $prepare_statement->execute([$username, $email]);
            $query_result = $prepare_statement->fetchAll();
            return $query_result;
        } else {
            var_dump($this->db->error);
        }
    }

    public function getAllUsers()
    {
        $select_query = 'SELECT userID, username, fullname FROM user';
        $prepare_statement = $this->conn->prepare($select_query);
        $prepare_statement->execute();
        $query_result = $prepare_statement->fetchAll();
        return $query_result;
    }

    public function checkIfUserExists($username)
    {
        $userResult = $this->getUserByUsername($username);

        if (sizeof($userResult) >= 1) {
            return true;
        } else {
            return false;
        }
    }
}
