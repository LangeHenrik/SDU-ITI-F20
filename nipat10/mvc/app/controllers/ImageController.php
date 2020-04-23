<?php

class ImageController extends Controller {


    public function index()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
            //User not logged in. Redirect them back to the login page.
            $this->view('home/index');
        }
        $this->view('home/upload');
    }

    public function upload(){
        if ($this->post()) {
            $this->model('Image')->upload();
            header('Location: /nipat10/mvc/public/home');
        }
        header('Location: /nipat10/mvc/public/home/upload');
               
    }

    public function images(){
        $images = $this->model('Image')->getAll();
        $this->view('home/imageFeed', $images);
	
    }

}
