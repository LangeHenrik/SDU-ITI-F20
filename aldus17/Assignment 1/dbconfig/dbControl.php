<?php

class DbController extends DbConfig
{
    public function insertUser($username, $fullname, $email, $phone, $password)
    {
        $insert_query = "INSERT INTO users (username, fullname, email, phone, password) VALUES (?,?,?,?,?);";
        $prepare_statement = $this->openConnection()->prepare($insert_query);
        $encryptedPassword = password_hash($password, PASSWORD_BCRYPT);

        return $prepare_statement->execute([$username, $fullname, $email, $phone, $encryptedPassword]);
    }

    public function getUserByUsername($username)
    {
        $select_query = "SELECT * FROM users WHERE username= ? ;";
        $prepare_statement = $this->openConnection()->prepare($select_query);
        $prepare_statement->execute([$username]);
        $query_result = $prepare_statement->fetchAll();
        return $query_result;
    }

    public function getUserByEmail($email)
    {
        $select_query = "SELECT * FROM users WHERE email= ? ;";
        $prepare_statement = $this->openConnection()->prepare($select_query);
        $prepare_statement->execute([$email]);
        $query_result = $prepare_statement->fetchAll();
        return $query_result;
    }

    public function getAllUsers()
    {
        $select_query = "SELECT * FROM users ;";
        $prepare_statement = $this->openConnection()->prepare($select_query);
        $prepare_statement->execute();
        $query_result = $prepare_statement->fetchAll();
        return $query_result;
    }
}
