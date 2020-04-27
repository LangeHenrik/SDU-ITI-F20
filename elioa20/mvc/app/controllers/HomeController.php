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

    public function register()
    {
        if($this->post()) {
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
                    $messages[] = "Registered";
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
        else{
            echo json_encode(
                array(
                    'ok' => false,
                    'messages' => ["You must use a POST request to register"]
                ));
        }
    }


}