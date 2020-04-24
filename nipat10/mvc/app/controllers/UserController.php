<?php

class UserController extends Controller
{
    public function index($param)
    {
    }

    
    public function register()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
            //User not logged in. Redirect them back to the login page.
            $this->view('home/index');
        } else {
            if ($this->post()) {
                $register_attempt = $this->model('User')->register();
                if ($register_attempt) {
                    //registration succesful
                    header('Location: /nipat10/mvc/public/home');
                } else {
                    //registration unsuccesful
                    header('Location: /nipat10/mvc/public/home/register');
                }
            } else {
                $this->view('home/register');
            }
        }
    }

    public function users()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
            //User not logged in. Redirect them back to the login page.
            $this->view('home/index');
        } else {
            $users = $this->model('User')->getAll();
            $this->view('home/userList', $users);
        }
    }
    
    
    public function login()
    {
        if ($this->post()) {
            $login_attempt = $this->model('User')->login();
            
            //Send message to login view
            header('Location: /nipat10/mvc/public/home/index');
        } else {
            echo 'You can only register with a post method';
        }
    }
}
