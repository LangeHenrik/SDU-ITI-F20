<?php
session_start();
if(!isset($_SESSION['id'])){
   header("Location:index.php");
}
include("config.php");

  // get the q parameter from URL
  if(isset($_GET['q'])) {
    $q_check = filter_var($_GET['q'], FILTER_SANITIZE_NUMBER_INT);
    $q = htmlspecialchars($q_check);
  	$q = $_GET['q'];

  }else {
	$q = "";
  }
$output="";
  if ($q === "") {

    $stmt = "SELECT id_user, username, email FROM user";
    $res = $db->query($stmt);

    while ($row = $res->fetch()){
    		$output = $output . "
    		<div class='contact_card'>
          <div>
    				<div>". $row['username'] ."</div>
    			 	<div>". $row['email'] ."</div>
    			</div>
          <br>
        </div>
    		";
      }
  } else {
    $stmt = "SELECT id_user, username, email FROM user WHERE username LIKE '$q%'";
    $res = $db->query($stmt);

    while ($row = $res->fetch()){
    		$output = $output . "
    		<div class='contact_card'>
          <div>
    				<div>". $row['username'] ."</div>
    			 	<div>". $row['email'] ."</div>
    			</div>
          <br>
        </div>
    		";
      }
	  echo($output);die;
  }
  $res->closeCursor(); // Termine le traitement de la requête

  /* close connection */

include('header.php');
ini_set('display_errors','on');
error_reporting(E_ALL);

?>

<div class="container_userlist">

<div class="title">Contact List</div>
  <form class="search_field" method="get">
    Username: <input type="text" name = 'q' onkeyup="showUser(this.value)">
  </form>
  <div ></div>
  <div class="contact_list" id="txtHint">
		<?php echo($output); ?>
  </div>
</div>

</div>
