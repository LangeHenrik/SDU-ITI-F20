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
        public function search($query){
            $queryWords= explode('+', $query);
            $properString = '';
            foreach ($queryWords as $word){
                $properString .= ' ' . $word;
            }
            echo 'You searched for query:' . $properString;
        }
        public function pictures($username,$id){
            if ($username=="user" && is_numeric($id)){
                if ($this->get()){
                    $getimages= $this->model('Image')->APIgetImagesfromUser($username,$id);
                    echo json_encode($getimages, JSON_PRETTY_PRINT);
                }elseif ($this->post()) {
                    $postimages= $this->model('Image')->APIpostImages($id);
                    echo json_encode($postimages, JSON_PRETTY_PRINT);
                }
            }
        }

}