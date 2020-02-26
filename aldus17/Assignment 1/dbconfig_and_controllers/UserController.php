<?php

include_once('DBConnection.php');
include_once('DBController.php');

class UserController extends DbController
{
    //private $dbcontroller;

    //public function __construct()
    //{
    //    $this->dbcontroller = new DBController();
    //}

    public function registerUser($username, $fullname, $email, $phone, $password)
    {
        $dbcontroller = new DbController();

        if ($dbcontroller->insertUser($username, $fullname, $email, $phone, $password)) {
            // echo 'Inseted user data successfully';
            return true;
        } else {
            echo 'Error while inserting data';
            return false;
        }
    }

    public function validateUserForLogin($username, $password)
    {

        $dbcontroller = new DbController();
        $userResult = $dbcontroller->getUserByUsername($username);

        if (sizeof($userResult) <= 0) {
            echo ' validateUser Login failed No result from database';
        }

        foreach ($userResult as $user) {
            if ($user['username'] == $username && $user['password'] == $password) {
                //echo ' validateUser Login success ';
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
            // echo 'Successfully uploaded image';
            return true;
        } else {
            echo 'Error occured while uploading image';
            return false;
        }
    }

    public function getAllUserImageFeed()
    {
        $dbcontroller = new DBController();
        $images = $dbcontroller->getAllUserImages();

        if (sizeof($images) >= 1) {
            return $images;
        } else {
            echo 'No images in feed found';
            return false;
        }
    }

    public function getAllUsersForUserlist()
    {
        $dbcontroller = new DBController();
        $users = $dbcontroller->getAllUsers();

        if (sizeof($users) >= 1) {
            return $users;
        } else {
            echo 'No users found';
            return false;
        }
    }
    
    public static function logout()
    {
        if (isset($_POST['logoutbtn'])) {
            $_SESSION['logged_in'] = false;
            header("Location: front_page.php");
            session_destroy();
            unset($_SESSION['username']);
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
