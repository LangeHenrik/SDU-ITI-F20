<?php
class HomeController extends Controller {
	public function __construct()
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}	
	}

	public function index ($param) {
		//This is a proof of concept - we do NOT want HTML in the controllers!
		echo '<br><br>Home Controller Index Method<br>';
		echo 'Param: ' . $param . '<br><br>';
	}
	
	public function other ($param1 = 'first parameter', $param2 = 'second parameter') {
		$user = $this->model('User');
		$user->name = $param1;
		$viewbag['username'] = $user->name;
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
		$this->view('home/index', $viewbag);
	}
	
	public function restricted () {
		echo 'Welcome - you must be logged in';
	}

	public function register () {
		$this->view('home/register');
		
		if (isset($_POST['Signup'])){
		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$password = filter_var($_POST['pwd'], FILTER_SANITIZE_STRING);
		$usernameRegex = '/^[a-zA-Z0-9]*$/';
        $emailRegex = '/[\w]+@+[\w]+./';
        $passwordRegex ='/^[a-zA-Z0-9]*$/';
		if (preg_match($usernameRegex,$username)){
            if (preg_match($emailRegex,$email)){
                if (preg_match($passwordRegex,$password)){
						if ($this->model('User')->doUserExists($username)) {
							$this->model('User')->register($username, $email, $password);
							header('Location: /jonas18/mvc/public/home/login');
						}
                }else {
                    echo 'user not created';
                }
            }else {
                echo 'user not created';
            }
        } else {
            echo 'user not created';
        }	
	}    
    }

	public function logout() {
		if($this->post()) {
			session_unset();
			header('Location: /jonas18/mvc/public/home/login');
		} else {
			echo 'You can only log out with a post method';
		}
	}

	public function login() {
	$this->view('home/login');
	if (isset($_POST['username']) && isset($_POST['pwd'])) {
		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$password = filter_var($_POST['pwd'], FILTER_SANITIZE_STRING);
		if ($this->model('user')->login($username, $password)) {
			$_SESSION['logged_in'] = true;
			$_SESSION['username'] = $username;

			header('Location: /jonas18/mvc/public/user/imagefeed');
		} else {
			echo 'please fill in the right information';
		}
	}
	}
}