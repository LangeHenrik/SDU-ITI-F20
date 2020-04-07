<?php

class UploadController extends Controller {

    public function index () {
        $this->view('pictures/upload');

    }


    public function uploadPictures(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = filter_var($_SESSION['username'],FILTER_SANITIZE_STRING);
            $header = filter_var($_POST["header"],FILTER_SANITIZE_STRING);
            $description = filter_var($_POST["description"],FILTER_SANITIZE_STRING);
            $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
            $file_base64 = 'data:image/' . $file_ext . ';base64,' . base64_encode(file_get_contents($_FILES['file']['tmp_name']));

            //$file = $_FILES["file"];

            $picture = $this->model('Picture')->upload($name , $header , $description , $file_base64);
            header("Location: /rayou18, kalau17, jlaur13/mvc/public/Upload");

        }
    }

}