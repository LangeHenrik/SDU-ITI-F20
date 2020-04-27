<?php

class ApiController extends Controller
{

    public function __construct()
    {
        header('Content-Type: application/json');
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

        if ($this->post()) {
            $postParam = json_decode($_POST['json'], true);

            $ok = $this->model('User')->validateUser($postParam['username'], $postParam['password']);
            if ($ok !== true) {
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
        } elseif ($this->get()) {
            self::getPictures($param1, $param2);
        }
    }

    public function getPictures($param1, $param2)
    {
        if ($param1 != "user") {
            echo json_encode(["error" => "Invalid URL"], JSON_PRETTY_PRINT);
            return;
        }

        $username = $this->model('User')->username($param2);

        if (is_null($username)) {
            echo json_encode(["error" => "Invalid User ID"], JSON_PRETTY_PRINT);
            return;
        }

        echo json_encode($this->model('Image')->getUserImages($username), JSON_PRETTY_PRINT);
    }

    public function uploadImage()
    {
        $postParam = json_decode($_POST['json'], true);
        $ok = $this->model('User')->validateUser($postParam['username'], $postParam['password']);
        if (!$ok) {
            echo json_encode(["error" => "Invalid Credentials"], JSON_PRETTY_PRINT);
            return;
        }

        $ok = true;

        $imageFileType = strtolower(pathinfo($_FILES['file']["name"], PATHINFO_EXTENSION));

        $header = htmlspecialchars($_POST["header"]);
        $description = htmlspecialchars($_POST["description"]);


        if (empty($_FILES)) {
            $ok = false;
            $messages[] = "You must choose a picture";
        }

        if (empty($header)) {
            $ok = false;
            $messages[] = "You must provide a header for the picture";
        }

        if (empty($description)) {
            $ok = false;
            $messages[] = "You must provide a description for the picture";
        }


        if ($ok) {
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES['file']["tmp_name"]);
            if ($check === false) {
                $messages[] = "File is not an image.";
                $ok = false;
            }

            // Check file size
            if ($_FILES["file"]["size"] > 500000) {
                $messages[] = "Sorry, your file is too large.";
                $ok = false;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                $messages[] = "Sorry, only JPG, JPEG & PNG files are allowed.";
                $ok = false;
            }
        }

        if ($ok) {
            $base64 = base64_encode(file_get_contents($_FILES['file']["tmp_name"]));

            if ($imageFileType == "jpg")
                $imageFileType = "jpeg";

            $blob = "data:image/" . $imageFileType . ";base64," . $base64;


            $return = $this->model('Image')->upload($blob, $header, $description, $_SESSION['logged_in']);
            if (!empty($return)) {
                $ok = true;
                $messages[] = "Successfully uploaded";
            }
        }

        echo json_encode(array(
                "ok" => $ok,
                "messages" => $messages
            )
        );
    }

}