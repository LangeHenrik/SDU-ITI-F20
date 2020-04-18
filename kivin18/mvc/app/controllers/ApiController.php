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
		$users = $this->model('User')->getUserIdAndName();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

	public function pictures ($user, $id) {
	    if ($this->post()) {
	        if($this->model('User')->apiUserId() == $id) {
                $response = $this->model('Image')->postApiImage();
                $array = array('image_id' => $response);
                $json = json_encode($array, JSON_PRETTY_PRINT);
                echo $json;
            }
        } else {
            $images = $this->model('Image')->getApiImages($id);
            echo json_encode($images, JSON_PRETTY_PRINT);
        }
    }

    public function checkusername ($username) {
	    $users = $this->model('User')->getUsers();
	    $found = false;
        foreach ($users as $user) {
            if ($username === $user['username']) {
                $found = true;
            }
	    }
        echo $found ? "Username is taken" : "Username is available";
    }

}
