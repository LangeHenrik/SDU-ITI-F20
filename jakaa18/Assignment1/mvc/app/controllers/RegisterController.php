<?php

include_once ("../app/models/User.php");
class RegisterController extends Controller {

    public $logged_in = false;
    public $viewbag;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
            $this->logged_in=true;
            $this->viewbag['username']=$_SESSION['username'];
        }
        $this->viewbag['logged_in'] = $this->logged_in;

        require_once '../app/core/Database.php';
    }

    public function index ($param) {

        //If the session is logged in, return Feed viewbag with pictures. If not, then return Login viewbag.
        //TODO Create Login view and Feed view
        if ($this->logged_in) {
            $this->viewbag['posts'] = $this->model('Post')->getPictures();
            $this->view('home/Feed', $this->viewbag);
        } else {
            $this->view('register/index', $this->viewbag);
        }
	}

	public function other ($param1 = 'first parameter', $param2 = 'second parameter') {
		$user = $this->model('User');
		$user->name = $param1;
		$viewbag['username'] = $user->name;
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
		$this->view('home/index', $viewbag);
	}

	public function createUser () {
        $username = $_POST['regUsernameId'];
        $password = $_POST['regPassId'];
        $User = new User();
        $User->newUser($username, $password);
    }

	public function restricted () {
		echo 'Welcome - you must be logged in';
	}
	
	public function register() {
        try {
            if (isset($_POST["regUsernameId"]) && isset($_POST["regPassId"])) {

                $new_user = htmlentities($_POST["regUsernameId"]);
                $new_pass = htmlentities($_POST["regPassId"]);
                $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                if($this->model('User')->newUser($new_user, $new_pass)){
                    $viewbag['user_info'] = 'User successfully created';
                    $this->view('home/index', $viewbag);
                    return;
                }
                $viewbag['user_info'] = 'User not created';
                $this->view('home/register/Register', $viewbag);
            }
        } catch
        (PDOException $e) {
            echo "ERROR" . $e->getMessage();
        }
	}
	
	public function logout() {

		if($this->post()) {
			session_unset();
			header('Location: /jakaa18/Assignment1/mvc/public/home/index');
		//} else {
		//	echo 'You can only log out with a post method';
		}
	}
	
	public function loggedout() {
		echo 'You are now logged out';
	}
	
}