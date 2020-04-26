<?php

class Api extends Controller {
	
	public function __construct () {
		header('Content-Type: application/json');
		//check api-key?
		//check username and password?
		//or die();
	}

	public function index ($param) {
		echo 'this ran';
	}
	
	public function users () {
		$users = $this->model('User')->getAll();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

    public function userid ($id) {
        $users = $this->model('User')->getId($id);
        echo json_encode($users, JSON_PRETTY_PRINT);
    }

	public function userImages ($id) {
		$users = $this->model('User')->getAllImages($id);
		echo json_encode($users, JSON_PRETTY_PRINT);
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