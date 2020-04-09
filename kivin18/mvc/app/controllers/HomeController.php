<?php

class HomeController extends Controller
{

    public function index($param)
    {
        if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
            $this->view('home/index');
        } else {
            header('Location: /kivin18/mvc/public/home/images');
        }
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
        if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
            $this->view('home/register');
        } else {
            header('Location: /kivin18/mvc/public/home/images');
        }
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

    public function users()
    {
        $result = $this->model('User')->getUsers();
        $viewbag = [];
        foreach ($result as $user) {
            array_push($viewbag, $user);
        }
        $this->view('home/users', $viewbag);
    }

    public function upload()
    {
        $this->view('home/upload');
    }

    public function addImage()
    {
        $this->model('Image')->upload();
        $this->view('home/upload');
    }

    public function images()
    {
        $viewbag = $this->model('Image')->getImages();
        $this->view('home/images', $viewbag);
    }

}
