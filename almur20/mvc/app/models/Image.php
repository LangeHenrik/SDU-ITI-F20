<?php
class Image extends Database {
	
    public function getImages() {
        try {
            $join_query = "SELECT I.image, I.description, I.header, U.username
                            FROM user_image J
                            JOIN user U ON J.user_id=U.user_id
                            JOIN image I ON J.image_id=I.image_id";
            $stmt = $this->conn->prepare($join_query);
    
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $_SESSION['images_count'] = $stmt->rowCount();
            if ($stmt->rowCount() >= 1) {                
                $results = $stmt->fetchAll();
                $_SESSION['results'] = $results;
                return $results;
            }
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}