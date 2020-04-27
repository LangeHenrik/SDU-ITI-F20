<?php

class HomeController extends Controller
{
    public function index()
    {
        $this->view('home/index', []);
    }

    public function restricted()
    {
        echo 'Welcome - you must be logged in';
    }

    public function feed()
    {
        $images = $this->model('Image')->getAll();
        $this->view('home/feed', ['images' => $images]);
    }


    public function register()
    {
        $this->view('home/register');
    }

    public function upload()
    {
        $_SESSION['username'] = "testuser";
        $this->view('home/upload');
    }

    public function imgUpload()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userID = $_SESSION['userID'];
            $title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);
            $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
            $base64 = $_POST["dataURL"];
            $a = getimagesize($base64);
            $image_type = $a[2];
            if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
                $imgID = $this->model('Image')->upload($userID, $title, $description, $base64);
                header("Location: /molyn18/mvc/public/home/feed");
            }
        }
    }

    public function users()
    {
        $images = $this->model('User')->getAll();
        $this->view('home/users', ['users' => $images]);
    }
}