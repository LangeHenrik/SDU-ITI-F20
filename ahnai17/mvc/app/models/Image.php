<?php

class Image extends Database {
    
    public function getAllImagesFromUser() {
        $images='SELECT image_id, Title, Description, Image_base64 FROM images where user_id=:id';
        $id='SELECT id from users where username=:username';
        
        
    }
    public function uploadImage(){
        if(isset($_FILES['image'])){
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
        }
        $sql='INSERT INTO images(image_id, Title, Description, Image_base64, user_id)
              VALUES(img_id, :Title,:Description, base64, :user_id)';
    }
    
}

