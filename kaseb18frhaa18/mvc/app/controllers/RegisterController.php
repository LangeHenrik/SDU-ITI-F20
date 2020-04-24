<?php

class RegisterController extends Controller
{
	public function index()
	{
		$this->view('home/registration');
		$this->nameOfUser();
	}

	public function registration()
	{

		if ($this->post()) {
			$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
			$username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
			$password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);

			if ($this->model('user')->register($name, $username, $password)) {
				if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
					echo '<div><h3 id="popUp">Registration is successful.</h3></div>';
					$this->view('home/imageFeed');
				} else {
					echo '<div><h3 id="popUp">Registration is successful.</h3></div>';
					$this->view('home/index');
				}
			} else {
				echo '<div><h3 id="popUp">Registration is not successful. Please try again.</h3></div>';
				$this->view('home/registration');
			}
		}
	}
}
