<?php

class ImageController extends Controller {
    public function index () {
        $this->view('image/index');
    }

    public function upload () {
        $viewbag = null;
        if ($this->post()) {
            $image_header = $_POST['header'];
            $image_description = $_POST['description'];
            $user_id = $_SESSION['userid'];
            $viewbag = $this->model('Image')->upload($header, $description, $userid);
        }
        $this->view('image/upload', $viewbag)
    }

    public function IMAGES () {
        $this->model('Image')->loadImagesFromModel();
    }
}