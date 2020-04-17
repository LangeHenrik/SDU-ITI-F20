<?php

class HomeController extends Controller {
	
	public function index ($param) {
		//This is a proof of concept - we do NOT want HTML in the controllers!
		/*echo '<br><br>Home Controller Index Method<br>';
		echo 'Param: ' . $param . '<br><br>';*/
	}
	
	public function other ($param1 = 'first parameter', $param2 = 'second parameter') {
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                $image= $this->model('Image');
                $viewbag = $image->getImages($_SESSION['username']);
		$user = $this->model('User');
		$user->name = $param1;
                $image->image_name=$param2;
		$viewbag['username'] = $user->name;
                $viewbag['image']=$image->image_name;
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
            }
		$this->view('home/index', $viewbag);
	}
	
	public function restricted () {
		echo 'Welcome - you must be logged in';
	}
	public function login() {
            if ($this->post()){
		if($this->model('User')->login()) {
			$_SESSION['logged_in'] = true;
			header('Location: /ahnai17/mvc/public/Image/upload_page');
		}
            } else {
                echo "failed to login";
            }
	}
	public function Login_page(){
            $this->view('home/login');
        }
        public function Home_page(){
            $this->view('home/index');
        }
         public function upload_page(){
        $this->view('home/upload');
        }
	public function logout() {
		if($this->post()) {
			session_unset();
			header('Location: /ahnai17/mvc/public/home/login_page');
		} else {
			echo 'You can only log out with a post method';
		}
	}
	public function register() {
            if ($this->post()){
                $this->model('User')->register();
                $this->view('home/registration');
            } else {
                header('Status: 403 You Do Not Have Access To This Page');
                echo '403 Forbidden';
            }
	}
	public function loggedout() {
		echo 'You are now logged out';
                header('Location: /ahnai17/mvc/public/home/login');
	}
	
}