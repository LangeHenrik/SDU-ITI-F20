<?php

class ContactController extends Controller {
	/**
	* session protected
	*/
	public function index($param = null) {
	  $viewbag['title'] = 'CONTACTS LIST';
	  // get the q parameter from URL
	  if(isset($_REQUEST['search'])) {
	    $search_check = filter_var($_REQUEST['search'], FILTER_SANITIZE_STRING);
	    $search = htmlspecialchars($search_check);
	  	$search = $_REQUEST['search'];
	  }else {
		$search = "";
	  }
	  $viewbag['output_userlist']="";
	  if ($search === "") {
	    $res = $this->model('User')->getAll();

			$row = $res->fetchAll();
		  $viewbag['output_userlist'] =  $row;

	  } else {
	    $res = $this->model('User')->getAll($search);
			$row = $res->fetchAll();
			$viewbag['output_userlist'] =  $row;
			//var_dump($viewbag['output_userlist']);


	  }
	  $res->closeCursor(); // End the request
	  $this->view('contacts/index', $viewbag);
	}

	public function search($param = null) {

	  // get the search parameter from URL
	  if(isset($_REQUEST['search'])) {
	    $search = filter_var($_REQUEST['search'], FILTER_SANITIZE_STRING);
	    //$search = htmlspecialchars($search_check);
	  	$search = $_REQUEST['search'];
	  }else {
		$search = "";
	  }
	  $viewbag['output_userlist']="";
	  if ($search === "") {
	    $res = $this->model('User')->getAll();

			$row = $res->fetchAll();
		  $viewbag['output_userlist'] =  $row;

	  } else {
	    $res = $this->model('User')->getAll($search);
			$row = $res->fetchAll();
			$viewbag['output_userlist'] =  $row;
			//var_dump($viewbag['output_userlist']);


	  }
	  $res->closeCursor(); // End the request
	  $this->blank_view('contacts/search', $viewbag);
	}

}
