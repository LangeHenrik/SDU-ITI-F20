<?php

class ImageController extends Controller {
    public function index() {
        if ($this->post()) {
            echo 'failed access';
        } else {
            header('Location: /ahnai17/mvc/public/home/Home_page');
        }
    }
    public function getImages() {
        $images = $this->model('Image');
        $viewbag = $images->getImages();
        $this->view('Feed/feed', $viewbag);
    }
    public function uploadImage() {
       $this->model('Image')->uploadImage();
       echo 'Image upload was succesful';
       $this->view('home/upload');
    }
}

