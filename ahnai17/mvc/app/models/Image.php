<?php

class Image extends Database {
    
    public function getAllImagesFromUser() {
        $images='SELECT image_id, Title, Description, Image_base64 FROM images where user_id=:id';
        
        
    }
    public function uploadImage(){
        $image_name;
    }
    
}

