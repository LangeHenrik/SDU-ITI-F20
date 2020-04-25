<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/yaliu20/mvc/app/services/RegisterService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/yaliu20/mvc/app/services/LoginService.php';

class HomeController extends Controller
{

    private $registerService;
    private $loginService;

    public function index($param)
    {
        $this->view('home/index');
    }

    // TODO: Move the HTML echos to the loginService class
    public function login($username)
    {

        if ($this->post()) {
            $userResult = $this->model('User')->getUserByUsernameForLogin($username);
            $this->loginService = new LoginService();
            $userCheck = $this->loginService->checkLogin($userResult);
            if ($userCheck != null) {
                if ($userCheck == true) {
                    $_SESSION['logged_in'] = true;
                    $viewbag['fullname'] = $userResult[0]['fullname'];
                    $viewbag['username'] = $userResult[0]['username'];

                    $_SESSION['username'] = $userResult[0]['username'];
                    $_SESSION['fullname'] = $userResult[0]['fullname'];

                    //$this->view('user/index', $viewbag);

                    header('Location: /yaliu20/mvc/public/user/index');
                    exit();
                } else {
                    $_SESSION['logged_in'] = false;
                    $_SESSION['ErrorMsg'] = $this->loginService->errors[0];
                }
            } else {
                $_SESSION['logged_in'] = false;
                $_SESSION['ErrorMsg'] = $this->loginService->errors[0];

                header('Location: /yaliu20/mvc/public/home/login');
            }
        } else {
            $this->view('home/index');
        }

        //header('Location: /yaliu20/yaliu20 assignment2/mvc/public/home/register');
    }

    public function register()
    {
        $this->view('home/registration_page');



        if ($this->post()) {
            if (isset($_POST['registerbtn'])) {
                $this->registerService = new RegisterService();
                if ($this->registerService->checkForSamePassword()) {
                    echo $this->registerService->errors[0];
                    exit();
                }

                if ($this->registerService->regexCheckPassword()) {
                    echo $this->registerService->errors[0];
                    exit();
                }

                if ($this->registerService->regexCheckUsername()) {
                    echo $this->registerService->errors[0];
                    exit();
                }

                if ($this->registerService->regexCheckFullname()) {
                    echo $this->registerService->errors[0];
                    exit();
                }

                if ($this->registerService->regexCheckEmail()) {
                    echo $this->registerService->errors[0];
                    exit();
                }

                if ($this->registerService->checkUser() == true) {
                    echo $this->registerService->errors[0];
                    exit();
                } else {
                    $this->registerService->registerUser();
                    header("refresh:3;url=/yaliu20/mvc/public/home/login");
                    echo $this->registerService->errors[0];
                }
            }
            //header('Location: /yaliu20/yaliu20 assignment2/mvc/public/home/register');
        }
    }

    public function restricted()
    {
        echo 'Welcome - you must be logged in';
    }



    public function logout()
    {
        session_destroy();
        header('Location: /yaliu20/mvc/public/home/');
    }
}
