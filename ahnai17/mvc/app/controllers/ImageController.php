<?php

class ImageController extends Controller {
    public function index() {
        if ($this->post()) {
            echo 'failed access';
        } else {
            header('Location: /ahnai17/mvc/public/home/index');
        }
    }
    public function getImages() {
        $this->getImages();
    }
    public function uploadImage() {
       
    }
}

