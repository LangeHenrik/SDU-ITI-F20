<?php

class UploadController extends Controller {

    public function index () {
        $this->view('upload');

    }


    public function uploadPictures(){
        $name = 'kasper';
        $header = $_POST['header'];
        $description = $_POST['description'];
        $file = $_POST['file'];
        $picture = $this->model('Picture')->upload($name , $header , $description , $file);
    }

}