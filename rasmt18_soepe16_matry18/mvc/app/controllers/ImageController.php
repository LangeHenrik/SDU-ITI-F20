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

        $this->model('Image')->loadImagesFromModel();
    }
}
