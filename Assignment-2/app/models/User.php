<?php

class User extends Database
{

    public function login($username)
    {
        $sql = "SELECT username, password FROM user WHERE username = :username";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $result = $stmt->fetch(); //fetchAll to get multiple rows

        print_r($result);


        //todo: make an actual login function!!
        return true;
    }

    public function getAll()
    {

        $sql = "SELECT ID, username FROM user ORDER BY ID;";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    public function getImagesById($id)
    {
        $sql = "SELECT ID, Mime, Image, Header, Description, UserID FROM picture WHERE UserID=" . $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function postImage($Mime, $Image, $Data, $Header, $Description, $UserID)
    {

        try {
            // insert data picture
            $sql = ("INSERT INTO picture (Mime, Image, Data, Header, Description, UserID) 
        VALUES (:Mime, :Image, :Data, '$Header', '$Description', '$UserID')");

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':Mime', $Mime, PDO::PARAM_STR, 50);
            $stmt->bindParam(':Image', $Image, PDO::PARAM_STR, 256);
            $stmt->bindParam(':Data', $Data);

            // executes the statment
            $stmt->execute();

            // shows if the connection fails
            echo 'Connected successfully';
            $success = ["Image_id" => $this->conn->lastInsertId()];
            echo  json_encode($success, JSON_PRETTY_PRINT);


        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getAllImages()
    {
        $sql = "SELECT * FROM picture";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

}