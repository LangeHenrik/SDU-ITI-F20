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

        if ($this->dbcontroller->insertUser($username, $fullname, $email, $phone, $password)) {
            return true;
        } else {
            echo 'Error while inserting data';
            return false;
        }
    }

    public function validateUserForLogin($username, $password)
    {

        $userResult = $this->dbcontroller->getUserByUsername($username);
        foreach ($userResult as $user) {
            if ($user['username'] == $username && password_verify($password, $user['password'])) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function checkIfUserExists($username)
    {
        $userResult = $this->dbcontroller->getUserByUsername($username);

        if (sizeof($userResult) >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function uploadImage($username, $image, $title, $description)
    {

        if ($this->dbcontroller->insertImage($username, $image, $title, $description)) {
            return true;
        } else {
            echo 'Error occured while uploading image';
            return false;
        }
    }

    public function getAllUserImageFeed()
    {
        $images = $this->dbcontroller->getAllUserImages();

        if (sizeof($images) >= 1) {
            return $images;
        } else {
            echo 'No images in feed found';
            return false;
        }
    }

    public function getAllUserImages()
    {
        return $this->dbcontroller->getAllUserImages();
    }

    public function getAllUsersForUserlist()
    {
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
    // if user is not logged in, redirect to index page
    public static function sessionRedirect()
    {
        if ($_SESSION['logged_in'] == false) {
            header("Location: front_page.php");
        }
    }

    public static function checkSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            return session_start();
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
