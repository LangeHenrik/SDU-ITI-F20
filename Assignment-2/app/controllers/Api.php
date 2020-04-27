<?php

class Api extends Controller
{

    public function __construct()
    {
        header('Content-Type: application/json');
        //check api-key?
        //check username and password?
        //or die();
    }

    public function index($param)
    {
    }

    public function users()
    {
        $users = $this->model('User')->getAll();
        echo json_encode($users, JSON_PRETTY_PRINT);
    }


    public function allImages()
    {
        $users = $this->model('User')->getAllImages();
        echo json_encode($users, JSON_PRETTY_PRINT);
    }

    public function pictures($user, $id)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            // Get Header
            $Header = htmlentities($_POST['Header']);
            $Description = htmlentities($_POST['Description']);
            // Get image, data and mine
            $Image = $_FILES['MyFile']['name'];
            $Mime = $_FILES['MyFile']['type'];
            $Data = file_get_contents($_FILES['MyFile']['tmp_name']);
            $users = $this->model('User')->postImage($Mime, $Image, $Data, $Header, $Description, $id);


        } else if ($_SERVER["REQUEST_METHOD"] == 'GET') {
            $users = $this->model('User')->getImagesById($id);
            echo json_encode($users, JSON_PRETTY_PRINT);
        }
    }

    public function test()
    {
        echo "something";
    }


    public function secret($n, $apikey)
    {

        //basic auth will reveal the secret
        $username = "myusername";
        $password = "mypassword";
        $_apikey = "myapikey";

        //print_r(apache_request_headers());
        //print_r($_SERVER);

        if ($_SERVER['PHP_AUTH_USER'] == $username
            && $_SERVER['PHP_AUTH_PW'] == $password
            && $apikey == $_apikey
        ) {
            echo 'Authorized!';
        } else {
            echo 'Not so much!';
        }

    }

    public function base64()
    {
        echo base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $_SERVER['PHP_AUTH_PW']);
    }

    public function insession()
    {
        if (isset($_SESSION['insession'])) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function setsession()
    {
        $_SESSION['insession'] = true;
    }


}