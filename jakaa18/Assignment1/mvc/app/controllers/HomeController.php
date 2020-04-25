<?php

class HomeController extends Controller {

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
    }

    public function index ($param) {

        //If the session is logged in, return Feed viewbag with pictures. If not, then return Login viewbag.
        //TODO Create Login view and Feed view
        if ($this->logged_in) {
            $this->viewbag['posts'] = $this->model('Post')->getPictures();
            $this->view('home/Feed', $this->viewbag);
        } else {
            $this->view('home/Login', $this->viewbag);
        }

        $path = "../app/views/home/index.php";
        include $path;
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
	
	public function login() {
        if ($this->post()) {
            if (isset($_POST["username"]) && isset($_POST["password"])) {
                $username = htmlentities($_POST["username"]);
                $password = htmlentities($_POST["password"]);

                if ($this->model('User')->login($username, $password)) {
                    print 'Logged in!';
                    $_SESSION['logged_in'] = true;
                    $_SESSION['username'] = $username;
                    //Redirect to Feed view
                    header('Location: /jakaa18/Assignment1/mvc/public/home/Feed');
                }
            }
        } elseif ($this->get()){
            $this->viewbag['logged_in'] = false;
            $this->view('home/login', $this->viewbag);
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