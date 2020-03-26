<?php

class ContactController extends Controller {
	/**
	* session protected
	*/
	public function index ($param = null) {
	  $viewbag['title'] = 'CONTACTS LIST';
	  // get the q parameter from URL
	  if(isset($_GET['q'])) {
	    $q_check = filter_var($_GET['q'], FILTER_SANITIZE_STRING);
	    $q = htmlspecialchars($q_check);
	  	$q = $_GET['q'];

	  }else {
		$q = "";
	  }
	  $viewbag['output_userlist']="";
	  if ($q === "") {
	    $res = $this->model('User')->getAll();

			$row = $res->fetchAll();
		  $viewbag['output_userlist'] =  $row;

	  } else {
	    $res = $this->model('User')->getAll($q);
			$row = $res->fetchAll();
			$viewbag['output_userlist'] =  $row;

	  }
	  $res->closeCursor(); // End the request
	  $this->view('contacts/index', $viewbag);
	}

}
