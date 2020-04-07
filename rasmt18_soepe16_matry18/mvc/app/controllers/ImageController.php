<?php

class ImageController extends Controller {
    public function index () {
        //This is a proof of concept - we do NOT want HTML in the controllers!
//		echo '<br><br>Home Controller Index Method<br>';
//		echo 'Param: ' . $param . '<br><br>';
        $this->view('image/index');
    }

    public function upload(){
        
        $this->view('image/upload');
    }
    public function uploadImage() {
        if($this->post()){
            $viewbag['response'] = $this->model('Image')->upload($_POST['header'],$_POST['description'], 
            $_SESSION['username'], $_POST['image']);
            $this->view('image/upload', $viewbag);        
        
        }
    }

    public function loadImages() {
        $this->model('Image')->loadImagesFromModel();

    }
}
