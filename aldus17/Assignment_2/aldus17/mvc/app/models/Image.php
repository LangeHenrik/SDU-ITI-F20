<?php
class Image extends Database {
	
	public function insertImage($username, $image, $title, $description)
    {
        $select_query = '(SELECT userID FROM user WHERE username=:username)';
        $insert_query = 'INSERT INTO imagefeed (userID, image, title, description) VALUES (' . $select_query . ', :image, :title, :description)';
        $prepare_statement = $this->conn->prepare($insert_query);
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

    public function getAllImages() {
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