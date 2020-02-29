<?php

include_once('DBConnection.php');
include_once('DBController.php');

class UserController extends DbController
{
    private $dbcontroller;

    public function __construct()
    {
        $this->dbcontroller = new DBController();
    }

    public function registerUser($username, $fullname, $email, $phone, $password)
    {
        // $dbcontroller = new DbController();

        if ($this->dbcontroller->insertUser($username, $fullname, $email, $phone, $password)) {
            // echo 'Inseted user data successfully';
            return true;
        } else {
            echo 'Error while inserting data';
            return false;
        }
    }

    public function validateUserForLogin($username, $password)
    {

        //$dbcontroller = new DbController();
        $userResult = $this->dbcontroller->getUserByUsername($username);

        if (sizeof($userResult) <= 0) {
            echo ' validateUser Login failed No result from database';
        }

        foreach ($userResult as $user) {
            if ($user['username'] == $username && password_verify($password, $user['password'])) {
                //echo ' validateUser Login success ';
                return true;
            } else {
                return false;
            }
        }
        //$usernameCleaned = $this->cleanData($username);
        echo ' validateUser Login failed ';
        return false;
    }

    public function checkIfUserExists($username)
    {
        //$dbcontroller = new DBController();
        $userResult = $this->dbcontroller->getUserByUsername($username);

        if (sizeof($userResult) >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function uploadImage($username, $image, $title, $description)
    {
        //$dbcontroller = new DBController();
        if ($this->dbcontroller->insertImage($username, $image, $title, $description)) {
            // echo 'Successfully uploaded image';
            return true;
        } else {
            echo 'Error occured while uploading image';
            return false;
        }
    }

    public function getAllUserImageFeed()
    {
        //$dbcontroller = new DBController();
        $images = $this->dbcontroller->getAllUserImages();

        if (sizeof($images) >= 1) {
            return $images;
        } else {
            echo 'No images in feed found';
            return false;
        }
    }

    public function getAllUsersForUserlist()
    {
        //$dbcontroller = new DBController();
        $users = $this->dbcontroller->getAllUsers();

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
            header("Location: index.php");
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
