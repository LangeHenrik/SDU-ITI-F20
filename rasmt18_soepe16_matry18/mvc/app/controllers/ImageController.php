<?php

class ImageController extends Controller {
    public function index () {
        //This is a proof of concept - we do NOT want HTML in the controllers!
//		echo '<br><br>Home Controller Index Method<br>';
//		echo 'Param: ' . $param . '<br><br>';
        $this->view('image/index');
    }

    public function upload(){
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
