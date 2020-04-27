<?php

class UserController extends Controller
{

    public function index()
    {
        return null;
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

            $res = $this->model('User')->login($user, $password);
            if($res){
                header('Login Sucess', true, 200);
                $_SESSION["userID"] = $res;
                exit;
            } else {
                header('Login Failed', true, 404);
                exit;
            };
        }
    }

    public function logout()
    {
        $_SESSION["userID"] = null;
        session_unset();
        header('Location: /molyn18/mvc/public/Home/');
        exit;
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
            $repeat_password = filter_var($_POST["repeat-password"], FILTER_SANITIZE_STRING);

            if ($password != $repeat_password or !preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/', $password)) {
                header('test', true, 400);
                exit;
            }

            if ($this->model('User')->create($user, $password)) {
                header('test', true, 200);
                exit;
            } else {
                header('test', true, 404);
                exit;
            }
        }
    }
}