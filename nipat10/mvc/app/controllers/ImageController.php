<?php

class ImageController extends Controller
{
    public function index($param)
    {
    }

    public function upload()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
            //User not logged in. Redirect them back to the login page.
            $this->view('home/index');
        }
        elseif ($this->post()) {
            $this->model('Image')->upload();
            $this->view('home/upload');
        }else{
            $this->view('home/upload');
        }
    }

    public function images()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
            //User not logged in. Redirect them back to the login page.
            $this->view('home/index');
        } else {
            $images = $this->model('Image')->getAll();
            $this->view('home/imageFeed', $images);
        }
    }
}
