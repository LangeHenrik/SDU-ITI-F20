<?php
class Image extends Database
{

    public function insertImageByUsername($username, $image, $title, $description)
    {
        $select_query = '(SELECT userID FROM user WHERE username=:username)';
        $insert_query = 'INSERT INTO imagefeed (userID, image, title, description) VALUES (' . $select_query . ', :image, :title, :description)';
        $prepare_statement = $this->conn->prepare($insert_query);
        if ($prepare_statement !== false) {
            $prepare_statement->bindParam(':username', $username);
            $prepare_statement->bindParam(':image', $image);
            $prepare_statement->bindParam(':title', $title);
            $prepare_statement->bindParam(':description', $description);

            if ($prepare_statement->execute([$username, $image, $title,  $description])) {
                return true;
            }else {
                return false;
            }
        }
    }

    public function insertImageByUserID($user_id, $image, $title, $description)
    {
        $select_query = '(SELECT userID FROM user WHERE userID=:user_id)';
        $insert_query = 'INSERT INTO imagefeed (userID, image, title, description) VALUES (' . $select_query . ', :image, :title, :description)';
        $prepare_statement = $this->conn->prepare($insert_query);
        if ($prepare_statement !== false) {
            $prepare_statement->bindParam(':user_id', $user_id);
            $prepare_statement->bindParam(':image', $image);
            $prepare_statement->bindParam(':title', $title);
            $prepare_statement->bindParam(':description', $description);

            $prepare_statement->execute([$user_id, $image, $title,  $description]);
            $imageID = $this->conn->lastInsertId();

            return $imageID;
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

    public function getAllUserImages($username) {
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
