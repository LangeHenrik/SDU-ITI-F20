<?php

class ImageController extends Controller {
    public function index () {
        $this->view('image/index');
    }

    public function upload(){
        $viewbag = null;
        if($this->post()){
            $header = $_POST['header'];
            $description = $_POST['description'];
            $user_id = $_SESSION['user_id'];
            $viewbag = $this->model('Image')->upload($header, $description, $user_id);
        }
        $this->view('image/upload',$viewbag);
    }

    public function loadImages() {
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            $this->model('Image')->loadImagesFromModel();
        } else{
            echo "You are not logged in so you can not load images. \nPlease log in";
        }
        
    }
}
