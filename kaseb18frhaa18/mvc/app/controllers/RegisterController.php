<?php

class RegisterController extends Controller
{
	public function index($param)
	{
		$this->view('home/registration');
	}

	public function registration()
	{

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
			$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
			$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

			if ($this->model('user')->register($name, $username, $password)) {
				if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
					echo '<script>alert("Registration Succesful. You will be redirected to Upload.")</script>';
					$this->view('home/UploadPage');
				} else {
					echo '<script>alert("Registration Succesful. You will be redirected to login.")</script>';
					$this->view('home/index');
				}
			} else {
				echo '<script>alert("Registration not succesful.")</script>';
				$this->view('home/registration');
			}
		}
	}
}
