<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/aldus17/mvc/app/services/RegisterService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/aldus17/mvc/app/services/LoginService.php';

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
            $userResult = $this->model('User')->getUserByUsername($username);
            $this->loginService = new LoginService();
            if (!empty($userResult) || !is_null($userResult)) {
                if ($userResult != false) {
                    $_SESSION['logged_in'] = true;
                    $viewbag['fullname'] = $userResult[0]['fullname'];
                    $viewbag['username'] = $userResult[0]['username'];

                    $_SESSION['username'] = $userResult[0]['username'];
                    $_SESSION['fullname'] = $userResult[0]['fullname'];

                    $this->view('user/index', $viewbag);

                    //header('Location: /mvc/public/home/front_page');
                } else {
                    /*  $this->view('home/index'); */
                    $_SESSION['logged_in'] = false;
                    /*  echo "<div id='messageWarning'><p>" .
                        "Username or password is wrong" .
                        "</p></br> " .
                        "</div>"; */

                    $_SESSION['ErrorMsg'] = "<div class='alert alert-warning alert-dismissible' data-dismiss='alert' role='alert'>" .
                        "<button type='button' class='close' data-dismiss='alert'>&times;</button>" .
                        "<strong>Warning!</strong> Username or password is wrong </div>";
                    header('Location: /aldus17/mvc/public/home/login');
                    
                }
            } else {
                /* $this->view('home/index'); */
                $_SESSION['logged_in'] = false;
                /* echo "<div id='messageWarning'><p>" .
                    "Username or password field is empty" .
                    "</p></br> " .
                    "</div>"; */
                $_SESSION['ErrorMsg'] = "<div class='alert alert-warning alert-dismissible' data-dismiss='alert' role='alert'>" .
                    "<button type='button' class='close' data-dismiss='alert'>&times;</button>" .
                    "<strong>Warning!</strong> Username or password field is empty </div>";
                header('Location: /aldus17/mvc/public/home/login');
                
            }
        } else {
            $this->view('home/index');
        }

        //header('Location: /aldus17/mvc/public/home/register');
    }

    public function register()
    {
        $this->view('home/registration_page');

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $cpassword = filter_input(INPUT_POST, 'password_confirm', FILTER_SANITIZE_STRING);


        if (isset($_POST['registerbtn'])) {
            $this->registerService = new RegisterService();
            if ($this->registerService->checkForSamePassword($password, $cpassword)) {
                echo $this->registerService->errors[0];
                exit();
            }

            if ($this->registerService->regexCheckPassword($password)) {
                echo $this->registerService->errors[0];
                exit();
            }

            if ($this->registerService->regexCheckUsername($username)) {
                echo $this->registerService->errors[0];
                exit();
            }

            if ($this->registerService->regexCheckFullname($fullname)) {
                echo $this->registerService->errors[0];
                exit();
            }

            if ($this->registerService->regexCheckEmail($email)) {
                echo $this->registerService->errors[0];
                exit();
            }

            if ($this->registerService->checkUser($username, $fullname, $email, $password) == true) {
                echo $this->registerService->errors[0];
                exit();
            } else {
                $this->registerService->registerUser($username, $fullname, $email, $password);
                header("refresh:3;url=/aldus17/mvc/public/home/login");
                echo $this->registerService->errors[0];
            }
        }
        //header('Location: /aldus17/mvc/public/home/register');
    }

    public function restricted()
    {
        echo 'Welcome - you must be logged in';
    }



    public function logout()
    {
        session_destroy();
        header('Location: /aldus17/mvc/public/home/');
    }
}
