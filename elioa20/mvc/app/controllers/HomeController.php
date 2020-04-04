<?php

class HomeController extends Controller
{

    public function index()
    {
        $this->view('home/index');
    }

    public function login()
    {
        $ok = true;
        $messages = [];

        if (empty($_POST['username'])) {
            $ok = false;
            $messages[] = "You must provide a username";
        }

        if (empty($_POST['password'])) {
            $ok = false;
            $messages[] = "You must provide a password";
        }

        if ($ok) {
            $return = $this->model('User')->login($_POST['username'], $_POST['password']);
            if ($return === true) {
                $_SESSION['logged_in'] = $_POST['username'];
                echo json_encode(
                    array(
                        'ok' => true,
                        'messages' => ["OK"]
                    ));
            } else {
                echo json_encode(
                    array(
                        'ok' => false,
                        'messages' => [$return]
                    ));
            }
        } else {
            echo json_encode(
                array(
                    'ok' => $ok,
                    'messages' => $messages
                ));
        }
    }

    public function registration()
    {
        $this->view('home/registration');
    }

    public function register()
    {
        $ok = true;
        $messages = [];

        if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password2'])) {
            $ok = false;
            $messages[] = "You must fill in all the fields";
        }

        if ($_POST['password'] !== $_POST['password2'] && $ok) {
            $ok = false;
            $messages[] = "Passwords don't match";
        }

        if (preg_match('/^(?=.{1,45}$)(?=.*?[a-z])(?=.*?[0-9]).*$/', $_POST['username']) === 0 && $ok) {
            $ok = false;
            $messages[] = 'Invalid username. Username must be between 1-45 characters, only lower-case characters and must contain at least 1 digit';
        }

        if (preg_match('/^(?=.{8,45}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).*$/', $_POST['password']) === 0 && $ok) {
            $ok = false;
            $messages[] = 'Invalid password. Password must be between 8-45 characters, have at least 1 lower-case character, have at least 1 upper-case character and have at least 1 digit';
        }

        if ($ok) {
            $return = $this->model('User')->register($_POST['username'], $_POST['password']);
            if ($return === true) {
                $ok = true;
                $messages[] = "Created";
                echo json_encode(
                    array(
                        'ok' => $ok,
                        'messages' => $messages
                    ));
            } else {
                $ok = false;
                $messages[] = $return;
                echo json_encode(
                    array(
                        'ok' => $ok,
                        'messages' => $messages
                    ));
            }
        } else {
            echo json_encode(
                array(
                    'ok' => $ok,
                    'messages' => $messages
                ));
        }
    }

    public function dashboard()
    {
        $this->view('home/dashboard');
    }

    public function feed()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'])
            echo json_encode($this->model('Image')->getAll());
    }

    public function users()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            $users = $this->model('User')->getAll();
            echo json_encode(array(
                "ok" => true,
                "messages" => $users
            ));
        }
    }

    public function uploadImage()
    {
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

        if (empty($description)){
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

            if($imageFileType=="jpg")
                $imageFileType = "jpeg";

            $blob = "data:image/" . $imageFileType . ";base64," . $base64;

            $return = $this->model('Image')->upload($blob,$header,$description,$_SESSION['logged_in']);
            if(!empty($return)){
                $ok = true;
                $messages[] = "Successfully uploaded";
            }
        }

        echo json_encode(array(
                "ok"=>$ok,
                "messages"=>$messages
            )
        );
    }

    public function restricted()
    {
        echo 'Welcome - you must be logged in';
    }

    public function logout()
    {
        if ($this->post()) {
            session_unset();
            echo json_encode(array(
                "ok" => true,
                "messages" => ["Logged_out"]
            ));
        }
    }


}