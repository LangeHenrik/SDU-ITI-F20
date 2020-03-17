<?php
include_once('DBConnection.php');

class DBController extends DBConnection
{
    public function insertUser($username, $fullname, $email,  $password)
    {
        $insert_query = 'INSERT INTO user (username, fullname, email, password) VALUES (:username, :fullname, :email, :password)';
        $prepare_statement = $this->openConnection()->prepare($insert_query);
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

    public function insertImage($username, $image, $title, $description)
    {
        $select_query = '(SELECT userID FROM user WHERE username=:username)';
        $insert_query = 'INSERT INTO imagefeed (userID, image, title, description) VALUES (' . $select_query . ', :image, :title, :description)';
        $prepare_statement = $this->openConnection()->prepare($insert_query);
        if ($prepare_statement !== false) {
            $prepare_statement->bindParam(':username', $username);
            $prepare_statement->bindParam(':image', $image);
            $prepare_statement->bindParam(':title', $title);
            $prepare_statement->bindParam(':description', $description);

            $queryExecute = $prepare_statement->execute([$username, $image, $title,  $description]);

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
        $select_query = 'SELECT * FROM user WHERE username=:username';
        $prepare_statement = $this->openConnection()->prepare($select_query);
        if ($prepare_statement !== false) {
            $prepare_statement->bindParam(':username', $username);
            $prepare_statement->execute([$username]);
            $query_result = $prepare_statement->fetchAll();
            return $query_result;
        } else {
            var_dump($this->db->error);
        }
    }

    public function getUserByUsernameAndMail($username, $email)
    {
        $select_query = 'SELECT * FROM user WHERE username=:username AND email=:email';
        $prepare_statement = $this->openConnection()->prepare($select_query);
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
        $select_query = 'SELECT username, fullname FROM user';
        $prepare_statement = $this->openConnection()->prepare($select_query);
        $prepare_statement->execute();
        $query_result = $prepare_statement->fetchAll();
        return $query_result;
    }
    public function getAllUserImages()
    {
        $select_query = 'SELECT username, image, title, description, creationTime
        FROM user, imagefeed
        WHERE imagefeed.userID=user.userID
        ORDER BY creationTime DESC';
        $prepare_statement = $this->openConnection()->prepare($select_query);
        $prepare_statement->execute();
        $query_result = $prepare_statement->fetchAll();
        return $query_result;
    }
}
