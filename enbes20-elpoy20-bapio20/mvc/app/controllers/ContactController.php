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
	    while ($row = $res->fetch()){
	    		$viewbag['output_userlist'] = $viewbag['output_userlist'] . "
	    		<div class='user_card'>
	          		<ul class=''>
			            <li>
		      				<div>Username : ". $row['username'] ."</div>
		      			 	<div>Email : ". $row['email'] ."</div>
			            </li>
	    			</ul>
	        	</div>
	    		";
	      }
	  } else {
	    $res = $this->model('User')->getAll($q);
	    while ($row = $res->fetch()){
	    		$viewbag['output_userlist'] = $viewbag['output_userlist'] . "
	    		<div class='user_card'>
		          <ul class=''>
		            <li>
		              <div>Username : ". $row['username'] ."</div>
		              <div>Email : ". $row['email'] ."</div>
		            </li>
    		      </ul>
	            </div>
	    		";
	      }
	      echo $viewbag['output_userlist'];
	      die();
	  }
	  $res->closeCursor(); // End the request
	  $this->view('contacts/index', $viewbag);
	}
}
