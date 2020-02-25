<?php

include_once('DBConnection.php');

class UserController extends DbController
{
    public function registerUser($username, $fullname, $email, $phone, $password)
    {
        $dbcontroller = new DbController();

        if ($dbcontroller->insertUser($username, $fullname, $email, $phone, $password)) {
            echo 'Inseted user data successfully';
            return true;
        } else {
            echo 'Error while inserting data';
            return false;
        }
    }

    public function validateUserForLogin($username, $password)
    {
        echo ' validate user ';
        $dbcontroller = new DbController();
        $userResult = $dbcontroller->getUserByUsername($username);

        if (sizeof($userResult) <= 0) {
            echo ' validateUser Login failed No result from database';
        }

        foreach ($userResult as $user) {
            if ($user['username'] == $username && $user['password'] == $password) {
                echo ' validateUser Login success ';
                return true;
            } else {
                echo 'Failed to login, username or password is wrong';
                return false;
            }
        }
        //$usernameCleaned = $this->cleanData($username);
        echo ' validateUser Login failed ';
        return false;
    }

    public function checkIfUserExists($username, $email)
    {
        $dbcontroller = new DBController();
        $userResult = $dbcontroller->getUserByMailAndUsername($username, $email);

        if (sizeof($userResult) >= 1) {
            return false;
        } else {
            return true;
        }
    }

    public function uploadImage($username, $image, $title, $description)
    {
        $dbcontroller = new DBController();
        if ($dbcontroller->insertImage($username, $image, $title, $description)) {
            echo 'Successfully uploaded image';
            return true;
        } else {
            echo 'Error occured while uploading image';
            return false;
        }
    }
    private function cleanData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}