<?php

class UploadController extends Controller {


    public function uploadPictures($param1 , $param2 , $param3 , $param4){
        $picture = $this->model('Picture');
        $name = $param1;
        $header = $param2;
        $description = $param3;
        $file = $param4;
        $picture->upload($name , $header , $description , $file);
    }

}