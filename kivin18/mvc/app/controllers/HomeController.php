<?php

class HomeController extends Controller
{

    public function index($param)
    {

        $this->view('home/index');
    }

    public function other($param1 = 'first parameter', $param2 = 'second parameter')
    {
        $user = $this->model('User');
        $user->name = $param1;
        $viewbag['username'] = $user->name;
        //$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
        $this->view('home/index', $viewbag);
    }

    public function restricted()
    {
        echo 'Welcome - you must be logged in';
    }

    public function login()
    {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            header('Location: /kivin18/mvc/public/home/');
            return;
        }
        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        if ($this->model('User')->login($username, $password)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = $username;
            $this->view('home/login');
        } else {
            $viewbag['user_info'] = 'Wrong username or password';
            $this->view('home/index', $viewbag);
        }
    }

    public function registerpage()
    {
        $this->view('home/register');
    }

    public function register()
    {
        if (isset($_POST['username']) && $_POST['password']) {
            $username = htmlentities($_POST['username']);
            $password = htmlentities($_POST['password']);
            if ($this->model('User')->register($username, $password)) {
                $viewbag['user_info'] = 'User successfully created';
                $this->view('home/index', $viewbag);
                return;
            }
        }
        $viewbag['user_info'] = 'User not created';
        $this->view('home/register', $viewbag);
    }

    public function logout()
    {
        session_unset();
        header('Location: /kivin18/mvc/public/home/');
    }

    public function users() {
        $viewbag = $this->model('User')->getUsers();
        $this->view('home/users', $viewbag);
    }

}
