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

    public function uploadImage() {
        if(isset($_POST['input'])) {    
            $image_uploaded = false;
            $status_message = '';
            require_once './upload_img.php';
    
            $header = htmlspecialchars(trim($_POST['input_img_header']));
            $description = htmlspecialchars(trim($_POST['input_img_description']));
            $new_image = $target_file;
    
            filter_input(FILTER_SANITIZE_STRING, $header, FILTER_FLAG_NO_ENCODE_QUOTES);
            filter_input(FILTER_SANITIZE_STRING, $description, FILTER_FLAG_NO_ENCODE_QUOTES);
            filter_input(FILTER_SANITIZE_STRING, $new_image, FILTER_FLAG_NO_ENCODE_QUOTES);
    
            if ($image_uploaded) {
                try {
                    $insert_query = "INSERT INTO image (image, header, description)
                                        VALUES (:image, :header, :description)";
    
                    $stmt = $this->conn->prepare($insert_query);
                    $stmt->bindParam(':image', $new_image, PDO::PARAM_STR);
                    $stmt->bindParam(':header', $header, PDO::PARAM_STR);
                    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    
                    //echo $new_image;
    
                    $stmt->execute();
    
                    $relation_query = 'INSERT INTO user_image (user_id, image_id)
                                        VALUES (
                                            (SELECT user_id FROM user WHERE username="'.$_SESSION['username'].'"),
                                            (SELECT image_id FROM image WHERE image="'.$new_image.'")
                                        )';
    
                    $stmt = $this->conn->prepare($relation_query);
                    $stmt->execute();
                }
                catch(PDOException $e) {
                    $e->getMessage();
                }
                
                $conn = null;
            }
        }
    }

    public function getImagesByUser($id) {
        try {
            $join_query = "SELECT I.image, I.header as title, I.description
                            FROM user_image J
                            JOIN user U ON J.user_id=U.user_id
                            JOIN image I ON J.image_id=I.image_id
                            WHERE U.user_id=$id";
            $stmt = $this->conn->prepare($join_query);
    
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() >= 1) {                
                $results = $stmt->fetchAll();
                return $results;
            }
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function uploadImageBase64($user_id,$image,$title,$description,$user,$password) {
        try {
            $search_query = "SELECT user_id, username, password FROM user WHERE user_id=:user_id;";
            $stmt = $this->conn->prepare($search_query);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() >= 1) {
                $result = $stmt->fetch();
                if ($result['username'] == $user)  
                    if (password_verify($password, $result['password'])) {
                        list($type, $image) = explode(';', $image);
                        list(, $image) = explode(',', $image);
                        $image = base64_decode($image);
                        $image_name = 'user_images/' . $user_id . $title . '.' . substr($type,strpos($type,'/')+1);
                        file_put_contents($image_name, $image);

                        $insert_query = "INSERT INTO image (image, header, description)
                                        VALUES (:image, :header, :description)";
    
                        $stmt = $this->conn->prepare($insert_query);
                        $stmt->bindParam(':image', $image_name, PDO::PARAM_STR);
                        $stmt->bindParam(':header', $title, PDO::PARAM_STR);
                        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        
                        $stmt->execute();
        
                        $relation_query = 'INSERT INTO user_image (user_id, image_id)
                                            VALUES (
                                                '.$user_id.',
                                                (SELECT image_id FROM image WHERE image="'.$image_name.'")
                                            )';
        
                        $stmt = $this->conn->prepare($relation_query);
                        $stmt->execute();
                    } 
            }       
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}