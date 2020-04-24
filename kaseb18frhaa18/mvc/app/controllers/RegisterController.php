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
			if ($this->model('user')->register()) {
				if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
					echo '<div><h3 id="popUp">Registration is successful.</h3></div>';
					$this->view('home/imageFeed');
				} else {
					echo '<div><h3 id="popUp">Registration is successful.</h3></div>';
					$this->view('home/index');
				}
			}
		}
	}
}
