<?php
class UserController extends DbController
{
    public function registerUser($username, $fullname, $email, $phone, $password)
    {
        $dbcontroller = new DbController();
        $dbcontroller->insertUser($username, $fullname, $email, $phone, $password);
    }

    public function validateUserForLogin($username, $password)
    {

        $dbcontroller = new DbController();
        $userResult = $dbcontroller->getUserByUsername($username);
        if (!$userResult) {
            echo '<p class="error">Username password combination is wrong!</p>';
            return false;
        } else {
            if (password_verify($password, $userResult['password'])) {
                $_SESSION['user_id'] = $userResult['ID'];
                echo '<p class="success">Congratulations, you are logged in!</p>';
                return true;
            } else {
                echo '<p class="error">Username password combination is wrong!</p>';
                return false;
            }
        }
    }
}
