<?php

class ApiController extends Controller {
	
	public function __construct () {
		header('Content-Type: application/json');
		//check api-key?
		//check username and password?
		//or die();
	}

	public function index ($param) {
		
	}
	
	public function users () {
		if ($this->get()) {
			$users = $this->model('User')->getAll();
		} else {
			echo '403 Forbidden request!';
		}
	}
	
	public function pictures($param1, $param2)
	{
		$id = $param2;

		if ($this->get()) {
			$pictures = $this->model('Picture')->getPictures($id);
		} else if ($this->post()) {
			$pictures = $this->model('Picture')->postPictures($id);
		} else {
			echo '403 Forbidden request!';
		}
	}

	public function secret ($n, $apikey) {

		//basic auth will reveal the secret
		$username = "myusername";
		$password = "mypassword";
		$_apikey = "myapikey";

		//print_r(apache_request_headers());
		//print_r($_SERVER);

		if( $_SERVER['PHP_AUTH_USER'] == $username
			&& $_SERVER['PHP_AUTH_PW'] == $password
			&& $apikey == $_apikey
		) {
			echo 'Authorized!';
		} else {
			echo 'Not so much!';
		}

	}

	public function base64 () {
		echo base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $_SERVER['PHP_AUTH_PW']);
	}

	public function insession () {
		if(isset($_SESSION['insession'])) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	public function setsession () {
		$_SESSION['insession'] = true;
	}


}