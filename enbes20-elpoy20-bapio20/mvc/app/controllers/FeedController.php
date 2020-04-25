<?php
class FeedController extends Controller{
	/**
	* session protected
	*/
	public function index ($param = null) {
		$viewbag['title'] = 'IMAGES FEED';
		$res = $this->model('Feed')->load_feed();
		$viewbag['output_feed'] = '';

		$row = $res->fetchAll();
		$viewbag['output_userlist'] =  $row;

		$res->closeCursor(); // Finish processing the request
		$this->view('feed/index', $viewbag);
	}

	/**
	* session protected
	*/
	public function upload(){
		$viewbag['title'] = 'UPLOAD PAGE';
		if (isset($_POST['formUpload'])) {
		  //We can also use $_SESSION['id'] if we don't use the URL ?id=
		  $user_id = filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT);
		  //$user_id = htmlspecialchars($user_idUp);

		  $header = filter_var($_POST['header'], FILTER_SANITIZE_STRING);
		  //$header = htmlspecialchars($headerUp);

		  $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
		  //$description = htmlspecialchars($descriptionUp);

		  $date=date("Y-m-d H:i:s");
		  //$user_id =$_GET['id'];
		  //$header =$_POST['header'];
		  //$description =$_POST['description'];

		  $name = $_FILES['file']['name'];
		  if(!empty($header) AND !empty($description)) {

		    // Type of the uploaded file
		    $type = strtolower(pathinfo($name,PATHINFO_EXTENSION));
		    //Check if allowed in array
		    $typeOK = array("jpg","jpeg","png","gif");

		    //$data = file_get_contents($name);

		    //check if extension exists in array()
		    if(in_array($type,$typeOK)){
		      if(!empty($user_id)){
		      $img64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
		      $image = 'data:image/'.$type.';base64,'.$img64;
		      //$base64 = 'data:image/' . $type . ';base64,' . base64_encode(file_get_contents($_FILES['file']['tmp_name']));

		     if($this->model('Feed')->upload(array($image, $header, $description,$date ,$user_id))){
			      //var_dump($stmt);
			      $viewbag['success'] = "Upload completed !";
				}
		      }
		      else {
		        $viewbag['error']="Check the URI (id missing)";
		      }
		    }
		    else {
		      $viewbag['error']="Check your type file (" . $type . ") only ". implode (",",$typeOK) ." are allowed";
		    }
		  }
		  else {
		    $viewbag['error']= "Upload failed : You must fill the Header and Description";
		  }
		}
		$this->view('feed/upload', $viewbag);
	}
}
