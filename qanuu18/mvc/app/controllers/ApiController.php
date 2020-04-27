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
		$users = $this->model('User')->getAll();
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


	public function pictures($user,$int){
	  


		$user = filter_var($user, FILTER_SANITIZE_STRING);
		
		if ($user == 'user'){

			if(is_numeric($user_id) && $user_id >=0 ){
				if($this->post()){
			}




		} else if ($this->get()) {
			




			$this->model('Image')->picturess($user_id);
			
		}

		}

	}


	public function uploadimages(){



	}
		
	
	public function getallimages(){
  
       

	}

	}
	


