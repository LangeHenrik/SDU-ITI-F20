<?php

class UploadController extends Controller {

    public function index () {
        $this->view('pictures/upload');

    }


    public function uploadPictures(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = "JohnDoe"; //filter_var($_POST["username"],FILTER_SANITIZE_STRING);
            $header = filter_var($_POST["header"],FILTER_SANITIZE_STRING);
            $description = filter_var($_POST["description"],FILTER_SANITIZE_STRING);
            $file = $_POST["file"];

            $picture = $this->model('Picture')->upload($name , $header , $description , $file);
            $this->view('pictures/upload');

        }
    }

}