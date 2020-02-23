<?php

class dbControl extends dbconfig
{
    public function insertUser($username, $fullname, $email, $phone, $password)
    {
        $insert_query = "INSERT INTO users (username, fullname, email, phone, password) VALUES (?,?,?,?,?);";
        $prepare_statement = $this->OpenCon()->prepare($insert_query);
        $prepare_statement->execute([$username, $fullname, $email, $phone, $password]);
    }

    public function getUser($username)
    {
        $select_query = "SELECT * FROM users WHERE username= ? ;";
        $prepare_statement = $this->OpenCon()->prepare($select_query);
        $prepare_statement->execute([$username]);
        $query_result = $prepare_statement->fetchAll();
        return $query_result;
    }

    
}
