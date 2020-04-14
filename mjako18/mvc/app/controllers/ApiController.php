<?php

class ApiController extends Controller {
	
	public function __construct () {
		header('Content-Type: application/json');
    //var_dump($_POST);
		//check api-key?
		//check username and password?
		//or die();
	}

	public function index ($param) {
		
	}

/* GET localhost:8080/xx/mvc/public/api/users */
/* [{"user_id":"1","username":"jack"},{"user_id":"2", "username":"jill"}] */
	public function users ($user) {
		$users = $this->model('Account')->getAccountList();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

/* GET localhost:8080/xx/mvc/public/api/pictures/user/2 */
/* [{"image": "blob","title": "some title","description":"my description"}] */
  public function pictures($param1, $param2) {
    if($this->get()) {
      $returnVal = test($param2);
    } else if($this->post()) {
      
    } else {
      $pictures = array("error"=>"wrong command");
    }
    echo json_encode($pictures, JSON_PRETTY_PRINT);
  }


  
/* POST localhost:8080/xx/mvc/public/api/pictures/user/2 */
/* {"image": "blob","title": "some title","description":"my description","username":"username","password":"actual password"}*/
/* {"image_id": "246"} */

}
