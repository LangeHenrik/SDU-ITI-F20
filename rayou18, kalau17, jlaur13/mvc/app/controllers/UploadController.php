<?php

class UploadController extends Controller {


    public function uploadPictures(){
        $name = 'kasper';
        $header = $_POST['header'];
        $description = $_POST['description'];
        $file = $_POST['file'];
        $picture = $this->model('Picture')->upload($name , $header , $description , $file);
    }

}