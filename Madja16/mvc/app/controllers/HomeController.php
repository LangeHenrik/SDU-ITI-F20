<?php

class HomeController extends Controller {
	
	public function index ($param) {
		// //This is a proof of concept - we do NOT want HTML in the controllers!
		// echo '<br><br>Home Controller Index Method<br>';
		// echo 'Param: ' . $param . '<br><br>';

		// if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
		// 	$viewbag['username'] = "placeholder";
		// 	$this->view('home/index', $viewbag);
		// }
		// else {
		// 	$viewbag['username'] = $param;
		// 	$this->view('home/index', $viewbag);
		// }

		$this->view('home/frontpage');
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

}