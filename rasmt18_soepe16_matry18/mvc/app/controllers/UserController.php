<?php


class UserController extends Controller
{
    public function index() {
        $viewbag['users'] = $this->model('User')->list();
        return($this->view('user/index', $viewbag));
    }

    public function login() {
        if (isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            if($this->model('User')->login($username, $password)) {
                $_SESSION['logged_in'] = true;
                header('Location: /rasmt18_soepe16_matry18/mvc/public/Image/index');
            } else {
                $viewbag['danger'] = "Username and password not accepted";
                $this->view('user/login', $viewbag);
            }
        } else {
            $this->view('user/login');
        }
    }

    public function logout() {
        session_unset();
        header('Location: /rasmt18_soepe16_matry18/mvc/public/Home/');
    }

    public function register() {
        if($this->post()){
            $viewbag =  $this->model('User')->register($_POST['username'], $_POST['password'], $_POST['password2']);
            $this->view('user/register', $viewbag);
        } else {
            $this->view('user/register');
        }
    }
}