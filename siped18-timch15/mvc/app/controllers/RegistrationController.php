<?php

class RegistrationController extends Controller
{
    public function index()
    {
        $this->view('home/registration');
    }

    public function registerUser()
    {
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

        if (
            preg_match("/^[\w|æøå|ÆØÅ|\d]+$/", $username) &&
            preg_match("/^(?=.*[A-ZÆØÅ])(?=.*[a-zæøå])[A-ZÆØÅa-zæøå\d]{8,}$/", $password)
        ) {
            $register_success = $this->model('User')->registerUser($username, $password);
            if ($register_success == "") {
                header("Location: /siped18-timch15/mvc/public");
            } else {
                //TODO error message on register fail
                $viewbag['registerSuccess'] = $register_success;
                $this->view('home/registration', $viewbag);
            }
        }
    }
}
