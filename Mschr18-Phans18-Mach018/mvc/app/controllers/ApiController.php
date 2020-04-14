<?php

class ApiController extends Controller {

	public function __construct () {
		header('Content-Type: application/json');
		//check api-key?
		//check username and password?
		//or die();
	}

	public function index ($param) {


		if (array of params contatin == 401) {
			echo "restricted";
		} else if (404) {
			echo "not found";
		}

		echo "URL: ".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$headers = apache_request_headers();
		foreach ($headers as $header => $value) {
			echo "$header: $value \n";
		}
	}

	public function users () {
		if ($this->isGet()) {
			$users = $this->model('User')->apiGetUsers();
			echo json_encode($users, JSON_PRETTY_PRINT);
		}
	}

	public function pictures ($userParam, $idParam) {

		if ( ($userParam=="user") && is_numeric($idParam)) {
			if ($this->isPost()) {
				$postRespons = $this->model('picture')->apiPostPicture($idParam);
				echo json_encode($postRespons , JSON_PRETTY_PRINT);
			} elseif ($this->isGet()) {
				$getRespons = $this->model('picture')->apiGetPicture($idParam);
				echo json_encode($getRespons , JSON_PRETTY_PRINT);
			}
		}
		else {

			if ($userParam!="user") {
				echo "Unknown param: '". $userParam . "' In apiController: method pictures. \n";
			}
			if (!is_numeric($idParam)) {
				echo "Unknown param: '". $idParam . "' In apiController: method pictures. \n";
			}
			echo "URL: ".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$headers = apache_request_headers();
			foreach ($headers as $header => $value) {
		    echo "$header: $value \n";
			}
		}
	}

}
