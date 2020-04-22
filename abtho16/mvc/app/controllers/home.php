<?php

class Home extends Controller
{

  public function index () {
		$this->view('home/index');
	}

  public function phone()
  {
    echo "I am phone";
  }
  public function other ($param1 = 'first parameter', $param2 = 'second parameter') {
		$this->view('home/index');
	}

  public function restricted () {
		echo 'Hello - you need to be logged in';
	}

	public function login() {
		$this->view('home/login');
	}




	public function logout() {
		if($this->post()) {
			session_unset();
			header('Location: ..');
		} else {
			echo 'You can only log out with a post method';
		}
	}
}
