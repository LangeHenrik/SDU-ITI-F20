<?php

class ImageController extends Controller {
    public function index() {
        if ($this->post()) {
            echo 'failed access';
        } else {
            header('Location: ' . BASE_URL . 'home/index');
        }
    }
    public function getImages() {
       
    }
    public function uploadImage() {
       
    }
    public function upload_page(){
        $this->view('home/upload');
    }
}

