<?php

class ApiController extends Controller
{

    public function __construct()
    {
        header('Content-Type: application/json');
    }

    public function index($param)
    {

    }

    public function users()
    {
        $users = $this->model('User')->getAll();
        echo json_encode($users, JSON_PRETTY_PRINT);
    }

    public function pictures($user, $id)
    {
        $userID = filter_var($id, FILTER_SANITIZE_STRING);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $json = json_decode($_POST['json'],true);
            $username = $json["username"];
            $password = $json['password'];
            $title = filter_var($json["title"], FILTER_SANITIZE_STRING);
            $description = filter_var($json["description"], FILTER_SANITIZE_STRING);
            $base64 = $json["image"];
            if ($this->model('User')->login($username, $password) == $userID) {
                $a = getimagesize($base64);
                $image_type = $a[2];
                if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
                    $imgID = $this->model('Image')->upload($userID, $title, $description, $base64);
                    echo json_encode($imgID, JSON_PRETTY_PRINT);
                }
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $images = $this->model('Image')->getAllFromID($userID);

            $z = [];
            foreach ($images as $image) {

                array_push($z, ["image" => $image["img"], "title" => $image["title"], 'description' => $image["description"]]);
            }
            echo json_encode($z, JSON_PRETTY_PRINT);
        }
    }
}