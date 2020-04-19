<?php

class HomeController extends Controller
{

    public function index()
    {

        $this->model('User')->userLogin();

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            $viewbag = ($this->model('ImageFeed')->showImages());
            $this->view('images/index', $viewbag);

        } else {
            $this->view('home/index');
        }
    }


    public function blobs()
    {
        $this->model('User')->userLogin();

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            $viewbag = ($this->model('ImageFeedblobs')->showImages());
            $this->view('images/indexblobs', $viewbag);
        } else {
            $this->view('home/index');
        }
    }


    public function registerUserModel()
    {

        if ($this->model('Register')->registerUser()) {
            $this->view('home/index');

        }

    }

    public function registerUserView()
    {
            $this->view('register/index');

    }


    public function userMenuView()
    {

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            $this->view('user/index');
        } else {
            $this->view('home/index');
        }
    }

    public function showUsersView()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            $viewbag = $this->model('User')->getAllUsers();
            $this->view('user/showUsers', $viewbag);
        } else {
            $this->view('home/index');
        }
    }


    public function searchForUser()
    {
        $viewbag = $this->model('Search')->searchForUser();
        $this->model('Search')->searchForUser();
    }

    public function upLoadView()
    {

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            $this->view('upload/index');
        } else {
            $this->view('home/index');
        }
    }

    public function uploadImage()
    {

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            if ($this->model('UploadImage')->upload()) {
                $this->view('upload/index');
                echo "Uploaded successfully ";
            } else {
                $this->view('upload/index');
            }

        } else {
            $this->view('home/index');
        }

    }





    public function logout()
    {
        session_unset();
        session_destroy();
        $this->view('home/index');
    }

    public function loggedout()
    {
        echo 'You are now logged out';
    }


    public function restricted()
    {
        echo 'Welcome - you must be logged in';
    }

    public function ajax()
    {
        $viewbag = $this->model('Search')->searchForUser();
        $this->view('user/userSearch', $viewbag);
    }


}