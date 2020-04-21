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
    public function checkLogin($userResult)
    {
        $ErrorMsgUsernameOrPassword = "<div class='alert alert-danger alert-dismissible' data-dismiss='alert' role='alert'>" .
            "<button type='button' class='close' data-dismiss='alert'>&times;</button>" .
            "<strong>Error!</strong> Username or password is wrong </div>";

        $ErrorMsgEmptyField = "<div class='alert alert-warning alert-dismissible' data-dismiss='alert' role='alert'>" .
            "<button type='button' class='close' data-dismiss='alert'>&times;</button>" .
            "<strong>Warning!</strong> Username or password field is empty </div>";

        if (is_null($userResult)) {
            $this->setError($ErrorMsgEmptyField);
            return null;
        } elseif ($userResult == false) {
            $this->setError($ErrorMsgUsernameOrPassword);
            return false;
        } else {
            return true;
        }
    }

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
