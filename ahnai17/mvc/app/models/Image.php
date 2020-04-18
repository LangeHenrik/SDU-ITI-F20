<?php

class Image extends Database {
    
    public function getAllImagesFromUser() {
        $images='SELECT image_id, Title, Description, Image_base64 FROM images where user_id=:id';
        $id='SELECT id from users where username=:username';
        
        
    }
    public function uploadImage(){
        if(isset($_FILES['upload'])){
            $errors= array();
            $file_name = filter_var($_FILES['upload']['name'], FILTER_SANITIZE_STRING);
            $file_size =$_FILES['upload']['size'];
            $file_tmp;
            $file_type=strtolower(pathinfo(basename($file_name),PATHINFO_EXTENSION));
            if($file_size > 2097152){
                $errors[]='File size must be 2 MB or less';
                echo 'error image size is too big';
                return false;
            } else {
                $image_64 = base64_encode(file_get_contents($_FILES['upload']['tmp_name']));
                $image_64 = 'data:image/' . $file_type . ';base64,' . $image_64;
                $title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);
                $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
                $description = substr($description, 0, 100);
                $stmt = $this->conn->prepare("INSERT INTO images (Title, 
                                              Description, Image_base64, user_id)
                                              VALUES(:Title, :Description, :Image_base64, :user_id)");
                $stmt->bindParam(':user_id', $_SESSION["id"]);
                $stmt->bindParam(':Title', $title);
                $stmt->bindParam(':Description', $description);
                $stmt->bindParam(':Image_base64', $image_64);
                $stmt->execute();
                return true;
            }  
        }
    }
}

