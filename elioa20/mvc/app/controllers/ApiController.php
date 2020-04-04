<?php

class ApiController extends Controller
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

    public function pictures($param1, $param2)
    {

        if ($param1 != "user") {
            echo json_encode(["error" => "Invalid URL"], JSON_PRETTY_PRINT);
            return;
        }

        if($this->post()) {
            $postParam = json_decode($_POST['json'], true);

            $ok = $this->model('User')->validateUser($postParam['username'], $postParam['password']);
            if (!$ok) {
                echo json_encode(["error" => "Invalid Credentials"], JSON_PRETTY_PRINT);
                return;
            }

            $userID = $this->model('User')->userID($postParam['username']);

            if ($userID != $param2) {
                echo json_encode(["error" => "User ID does not match with User Credentials"], JSON_PRETTY_PRINT);
                return;
            }


            $uploadedImage = $this->model('Image')->upload($postParam['image'], $postParam['title'], $postParam['description'], $postParam['username']);
            echo json_encode($uploadedImage, JSON_PRETTY_PRINT);
        }
        elseif ($this->get()){
            self::getPictures($param1,$param2);
        }
    }


    public function getPictures($param1, $param2)
    {
        if ($param1 != "user") {
            echo json_encode(["error" => "Invalid URL"], JSON_PRETTY_PRINT);
            return;
        }

        $username = $this->model('User')->username($param2);

        if(is_null($username)){
            echo json_encode(["error"=>"Invalid User ID"],JSON_PRETTY_PRINT);
            return;
        }

        echo json_encode($this->model('Image')->getUserImages($username),JSON_PRETTY_PRINT);
    }

}