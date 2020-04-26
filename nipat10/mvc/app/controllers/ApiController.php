<?php

class ApiController extends Controller
{
    


    //API call to get a json with all users, endpoint: http://localhost:8080/nipat10/mvc/public/api/users
    public function users()
    {
        if ($this->get()) {
			$users = $this->model('User')->getAllUsers();
			echo json_encode($users, JSON_PRETTY_PRINT);
        } else {
            //If the API request is anything other than GET, it will get an error
            echo '403 Forbidden request!';
        }
    }
    
    

    //Here API call of same endpoint will be checked to do the following:
    //-To see whether it is of correct endpoint
    //-Sent to the appropriate method based on POST/GET method
    public function pictures($user, $user_id)
    {
        if ($user == 'user' && is_numeric($user_id) && $user_id >= 0) {
            if ($this->post()) {
                $this->picturesPOST($user_id);
            } elseif ($this->get()) {
                $this->picturesGET($user_id);
            } else {
                //If the API request is anything other than GET, it will get an error
                echo '403 Forbidden request!';
            }
        }else {
			//If the API request is of wrong endpoint, it will get an error
			echo '403 Forbidden request!';
		}
    }

	//Calls model to post a picture
	//Returns json with image_id
    private function picturesPOST($user_id)
    {
		$image_id = $this->model('Picture')->postPictures($user_id);
		header('Content-Type: application/json');
        echo json_encode($image_id, JSON_PRETTY_PRINT);
    }

	//Calls model to get all pictures of specific user
	//Returns json with all images
    private function picturesGET($user_id)
    {
		$user_pictures = $this->model('Picture')->getPictures($user_id);
		header('Content-Type: application/json');
        echo json_encode($user_pictures, JSON_PRETTY_PRINT);
    }
}
