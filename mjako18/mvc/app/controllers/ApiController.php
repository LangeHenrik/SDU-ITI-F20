<?php
/* SERVICE? */
class ApiController extends Controller {
	private $userId = null;
	public function __construct () {
    if(!isset($_SERVER['PHP_AUTH_USER']) && !isset($_SERVER['PHP_AUTH_PW'])) {
      header('HTTP/2.0 401 Unauthorized');
      header('WWW-Authenticate: Basic realm="image share"');
    } else {
      $this->userId=$this->model("Account")->login(array('username'=>$_SERVER['PHP_AUTH_USER'], 'password'=>$_SERVER['PHP_AUTH_PW']));
      if($this->userId == 0) {
        header('HTTP/2.0 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="image share2"');
      } else {
        header('Content-Type: application/json');
        
      }
    }

    //var_dump($_POST);
		//check api-key?
		//check username and password?
		//or die();
    //echo json_encode($_SESSION);
	}

	public function index ($param) {
		
	}

/* GET localhost:8080/xx/mvc/public/api/users */
/* [{"user_id":"1","username":"jack"},{"user_id":"2", "username":"jill"}] */
	public function users ($user) {
    if(!empty($this->userId)) {
  		$users = $this->model('Account')->getAccountList();
  		echo json_encode($users, JSON_PRETTY_PRINT);
    }
	}

/* GET localhost:8080/xx/mvc/public/api/pictures/user/2 */
/* [{"image": "blob","title": "some title","description":"my description"}] */
  public function pictures($param1, $param2) {
    $returnVal = [];
    if($this->get()) {
      if($param1 == "user" && $param2 == $_SESSION['AccountID']) {
        $imageList = $this->model('Gallery')->getUserImageList($param2);
        foreach($imageList as $key => &$val) {
          $val["image"] = base64_encode(file_get_contents($val["image"]));
        }
        $returnVal = $imageList;
      } else {
        $returnVal["error"][] = "User not logged in.";
      }
    } else if($this->post()) {
      if($param1 == "user" && $param2 == $_SESSION['AccountID']) {
        $json = json_decode($_POST['json']);
        $returnVal += $this->model('Gallery')->saveImageAPI($json);
      } else {
        $returnVal["error"][] = "User credentials does not match URL.";
      }
    } else {
      $returnVal["error"][] = "wrong command";
    }
    echo json_encode($returnVal, JSON_PRETTY_PRINT);
  }


  
/* POST localhost:8080/xx/mvc/public/api/pictures/user/2 */
/* {"image": "blob","title": "some title","description":"my description","username":"username","password":"actual password"}*/
/* {"image_id": "246"} */

}
