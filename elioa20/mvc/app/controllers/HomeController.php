<?php

//TODO Remove functionalities that do not return a view and call API instead
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

    public function odinsBlog()
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

    public function restricted()
    {
        echo 'Welcome - you must be logged in';
    }

    public function logout()
    {
        if ($this->post()) {
            session_unset();
        }
    }


}