<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/aldus17/mvc/app/core/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/aldus17/mvc/app/models/User.php';
class LoginService
{

    private $userModel;
    public $errors;


    public function __construct()
    {

        $this->userModel = new User();
        $this->errors = array();
    }

    // TODO: make same sort of logic as in RegisterService


    private function setError($error)
    {
        $this->errors[] = $error;
    }
    public function getErrors()
    {
        if (!empty($errors)) {
            foreach ($this->errors as $error) {
                return $error;
            }
        }
    }
}
