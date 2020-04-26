<?php

class ImageController extends Controller
{
    public function index($param)
    {
    }

    //Sets view accordingly based whether user is logged in or not
    public function upload()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
            //User not logged in. Redirect them back to the login page.
            $this->view('home/index');
        }
        elseif ($this->post()) { 
            //If the request is of type POST, it will pass the request to its model
            $this->model('Image')->upload();
            $this->view('home/upload');
        }else{
            $this->view('home/upload');
        }
    }

    //Sets view accordingly based whether user is logged in or not
    public function images()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
            //User not logged in. Redirect them back to the login page.
            $this->view('home/index');
        } else {
            //Calls its model to return the images saved in db.
            //It then passes those images to view via viewbag.
            $images = $this->model('Image')->getAll();
            $this->view('home/imageFeed', $images);
        }
    }
}
