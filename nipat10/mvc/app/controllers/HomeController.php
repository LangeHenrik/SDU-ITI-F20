<?php

class HomeController extends Controller
{
    public function index()
    {
        $this->view('home/index');
    }

    public function register()
    {
        //Check whether user is logged in or not.
        //If user is logged in, show message.
        //If user is not logged in, show the register form
        //if (isset($_SESSION['username'])) {
        //  $this->view('home/index');
        //} else {
        $this->view('home/register');
        //}
    }

    public function upload(){
        $this->view('home/upload');
    }

    public function restricted()
    {
        echo 'Welcome - you must be logged in';
    }

    public function login($username)
    {
        if ($this->model('User')->login($username)) {
            $_SESSION['logged_in'] = true;
            $this->view('home/login');
        }
    }

    public function logout()
    {
        if ($this->post()) {
            session_unset();
            header('Location: mvc/public/home/loggedout');
        } else {
            echo 'You can only log out with a post method';
        }
    }

    public function loggedout()
    {
        echo 'You are now logged out';
    }
}
