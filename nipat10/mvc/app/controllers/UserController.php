<?php

class UserController extends Controller
{
    public function index($param)
    {
    }

    

    public function register()
    {
            //If the request is of type POST, it will pass the request to its model
            if ($this->post()) {
                $register_attempt = $this->model('User')->register();
                if ($register_attempt) {
                    //Registration succesful - Redirect back to home page
                    header('Location: /nipat10/mvc/public/home');
                } else {
                    //Registration unsuccesful - Redirect back to register page (Same view)
                    header('Location: /nipat10/mvc/public/home/register');
                }
            } else {
                //If the request is not of type GET, it display the register view.
                $this->view('home/register');
            }
        
    }

    //Sets view accordingly based whether user is logged in or not
    public function users()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
            //User not logged in. Redirect them back to the login page.
            $this->view('home/index');
        } else {
            //Calls model to return a list of all users.
            //Passes the data to a viewbag and sends it to its the view.
            $users = $this->model('User')->getAll();
            $this->view('home/userList', $users);
        }
    }
    
    
    public function login()
    {
        //If the request is of type POST, it will pass the login request to its model
        if ($this->post()) {
            $login_attempt = $this->model('User')->login();
                        
            header('Location: /nipat10/mvc/public/home/index');
        } else {
            echo 'You can only register with a post method';
        }
    }
}
