<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/aldus17/mvc/app/core/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/aldus17/mvc/app/models/User.php';

class RegisterService
{

    private $userModel;
    public $errors;


    public function __construct()
    {

        $this->userModel = new User();
        $this->errors = array();
    }

    public function checkForSamePassword($password, $cpassword)
    {
        if ($password != $cpassword) {

            $error = "<div class='alert alert-warning alert-dismissible' data-dismiss='alert' role='alert'>" .
                "<button type='button' class='close' data-dismiss='alert'>&times;</button>" .
                "<strong>Warning!</strong> Password is not the same </div>";
            $this->setError($error);
            return true;
        } else {
            return false;
        }
    }

    public function regexCheckPassword($password)
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            $error = "<div class='alert alert-warning alert-dismissible' data-dismiss='alert' role='alert'>" .
                "<button type='button' class='close' data-dismiss='alert'>&times;</button>" .
                "<strong>Warning!</strong> Password should be at least 8 characters in length and should include at least one upper case letter and one number" .
                "</div>";
            $this->setError($error);
            return true;
        } else {
            return false;
        }
    }
    public function regexCheckUsername($username)
    {
        $regexCheckUsername = preg_match('/^([A-Za-z0-9]){4,20}$/', $username);
        if (empty($username) || !$regexCheckUsername) {
            $error = "<div class='alert alert-warning alert-dismissible' data-dismiss='alert' role='alert'>" .
                "<button type='button' class='close' data-dismiss='alert'>&times;</button>" .
                "<strong>Warning!</strong> You entered username <u>" . $username . "</u><br>" .
                "Username is empty or username is not between 4-20 characters long, only numbers and letters, no special characters" .
                "</div>";
            $this->setError($error);
            return true;
        } else {
            return false;
        }
    }
    public function regexCheckFullname($fullname)
    {
        $regexCheckFullname = preg_match('/(^(\w+\s+\D).+$)/', $fullname);
        if (empty($fullname) || !$regexCheckFullname) {
            $error = "<div class='alert alert-warning alert-dismissible' data-dismiss='alert' role='alert'>" .
                "<button type='button' class='close' data-dismiss='alert'>&times;</button>" .
                "<strong>Warning!</strong> You entered fullname <u>" . $fullname . "</u><br> " .
                "The fullname is either empty or fullname does not meet criteria. It must contain first and lastname, no numbers allowed" .
                "</div>";
            $this->setError($error);

            return true;
        } else {
            return false;
        }
    }
    public function regexCheckEmail($email)
    {
        $regexCheckEmail = preg_match('/(\b[\w\.-]+@[\w\.-]+\.\w{2,26}\b)/', $email);
        if (empty($email) || !$regexCheckEmail) {
            $error = "<div class='alert alert-warning alert-dismissible' data-dismiss='alert' role='alert'>" .
                "<button type='button' class='close' data-dismiss='alert'>&times;</button>" .
                "<strong>Warning!</strong> You entered email <u> " . $email . "</u><br>Email is either empty or email must contain a @ and a . afterwards, e.g. test@test.com" .
                "</div>";
            $this->setError($error);

            return true;
        } else {
            return false;
        }
    }

    public function checkUser($username, $fullname, $email, $password)
    {
        if ($this->userModel->checkIfUserExists($username) == true) {
            $error = "<div class='alert alert-warning alert-dismissible' data-dismiss='alert' role='alert'>" .
                "<button type='button' class='close' data-dismiss='alert'>&times;</button>" .
                "<strong>Warning!</strong> User with username <u>" . $username . "</u> already exist" .
                "</div>";
            $this->setError($error);

            return true;
        } else {
            return false;
        }
    }
    public function registerUser($username, $fullname, $email, $password)
    {
        $this->userModel->insertUser($username, $fullname, $email, $password);
        $error = "<div id='successMessageAlert' class='alert alert-success alert-dismissible' data-dismiss='alert' role='alert'>" .
            "<button type='button' class='close' data-dismiss='alert'>&times;</button>" .
            "<strong>Success!</strong> Account with username <u>" . $username . "</u> and email <u>" . $email . "</u> created successfully.<br>" .
            "Redirecting you to the login page in <strong><p id='redirectMsg'>5 seconds</p></strong>" .
            "</div>";
        $this->setError($error);
        return true;
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
