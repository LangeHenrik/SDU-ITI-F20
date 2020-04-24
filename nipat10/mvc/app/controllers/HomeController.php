<?php

class HomeController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
            //User not logged in. Redirect them back to the login page.
            $this->view('home/index');
        } else {
               $this->view('home/welcome');
            }
    }

    public function register()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
            //User not logged in. Redirect them back to the login page.
            $this->view('home/register');
        } else {
               $this->view('home/index');
            }
    }

    public function upload(){
        $this->view('home/upload');
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
}
