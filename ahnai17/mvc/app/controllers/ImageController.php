<?php

class ImageController extends Controller {
    public function index() {
        if ($this->post()) {
            echo 'failed access';
        } else {
            header('Location: /ahnai17/mvc/public/home/Home_page');
        }
    }
    public function getImages($user_name) {
        $this->getImages($user_name);
    }
    public function uploadImage() {
       
    }
}

