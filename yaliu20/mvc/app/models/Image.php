<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/yaliu20/mvc/app/core/Database.php';

class Image extends Database
{

    public function insertImageByUsername($username, $image, $title, $description)
    {
        $select_query = '(SELECT userID FROM user WHERE username=:username)';
        $insert_query = 'INSERT INTO imagefeed (userID, image, title, description) VALUES (' . $select_query . ', :image, :title, :description)';
        $prepare_statement = $this->conn->prepare($insert_query);

        $prepare_statement->bindParam(':username', $username);
        $prepare_statement->bindParam(':image', $image);
        $prepare_statement->bindParam(':title', $title);
        $prepare_statement->bindParam(':description', $description);

        $prepare_statement->execute([$username, $image, $title,  $description]);
    }

    public function insertImageByUserID($user_id, $userResult)
    {

        // php://input is a read-only stream that allows you to read raw data from the request body.
        // https://stackoverflow.com/questions/28365349/php-notice-trying-to-get-property-of-non-object

        //$imageData = (array) json_decode(file_get_contents('php://input'), TRUE);
        $imageData = (array) json_decode($_POST['json']);

        $image = filter_var($imageData['image'], FILTER_SANITIZE_STRING);
        $title = filter_var($imageData['title'], FILTER_SANITIZE_STRING);
        $description = filter_var($imageData['description'], FILTER_SANITIZE_STRING);
        $username = filter_Var($imageData['username'], FILTER_SANITIZE_STRING);
        $password = filter_Var($imageData['password'], FILTER_SANITIZE_STRING);


        if ($username == $userResult[0]['username'] && password_verify($password, $userResult[0]['password'])) {
            $select_query = '(SELECT userID FROM user WHERE userID=:user_id)';
            $insert_query = 'INSERT INTO imagefeed (userID, image, title, description) VALUES (' . $select_query . ', :image, :title, :description)';
            $prepare_statement = $this->conn->prepare($insert_query);

            $prepare_statement->bindParam(':user_id', $user_id);
            $prepare_statement->bindParam(':image', $image);
            $prepare_statement->bindParam(':title', $title);
            $prepare_statement->bindParam(':description', $description);

            $prepare_statement->execute([$user_id, $image, $title,  $description]);
            $imageID = $this->conn->lastInsertId();

            return $imageID;
        } else {
            return false;
        }
    }

    public function getImageByUserID($user_id)
    {

        $select_query = 'SELECT imageID, image, title, description, creationTime 
        FROM imagefeed 
        WHERE imagefeed.userID=(SELECT userID FROM user WHERE user.userID=:userid)
        ORDER BY creationTime DESC';

        $prepare_statement = $this->conn->prepare($select_query);
        if ($prepare_statement !== false) {
            $prepare_statement->bindParam(':userid', $user_id);
            $prepare_statement->execute();
            $query_result = $prepare_statement->fetchAll();
            return $query_result;
        }
    }

    public function getAllUserImages($username)
    {
        $select_query = 'SELECT username, image, title, description, creationTime
        FROM user, imagefeed
        WHERE imagefeed.userID=(SELECT userID FROM user WHERE user.username=:username)
        ORDER BY creationTime DESC';
        $prepare_statement = $this->conn->prepare($select_query);
        $prepare_statement->bindParam(':username', $username);
        $prepare_statement->execute();
        $query_result = $prepare_statement->fetchAll();
        return $query_result;
    }

    public function getAllImages()
    {
        $select_query = 'SELECT username, image, title, description, creationTime
        FROM user, imagefeed
        WHERE imagefeed.userID=user.userID
        ORDER BY creationTime DESC';
        $prepare_statement = $this->conn->prepare($select_query);
        $prepare_statement->execute();
        $query_result = $prepare_statement->fetchAll();
        return $query_result;
    }
}
