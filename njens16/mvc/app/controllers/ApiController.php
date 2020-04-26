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
    
    public function pictures ($user, $userID)
    {
        if ($this->post() && isset($_POST["json"]))
        {
            if ($this->model("User")->APIverifyUser($userID))
            {
                $imageUploadID = $this->model("Image")->APIuploadImage($userID);
                echo json_encode($imageUploadID, JSON_PRETTY_PRINT);
            }
            else
            {
                echo "error in post";
            }
        }
        else if ($this->post())
        {
            echo "error, no json in post";
        }
        else
        {
            $userImages = $this->model("Image")->APIgetUserImage($userID);
            echo json_encode($userImages, JSON_PRETTY_PRINT);
        }
    }


}
