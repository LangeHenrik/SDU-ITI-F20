<?php
session_start();
if(!isset($_SESSION['id'])){
   header("Location:index.php");
}

include('header.php');
ini_set('display_errors','on');
error_reporting(E_ALL);
include("config.php");
?>

<div class="container_userlist">

<div class="title">Contact List</div>
  <form class="search_field" method="get">
    Username: <input type="text" name = 'q' onkeyup="showUser(this.value)">
  </form>
  <div class="txtHint"></div>
  <div class="contact_list">
  <?php
  // get the q parameter from URL
  $q = $_GET['q'];
  //echo $q;


  /*$stmt = "SELECT id_user, username, email FROM user";
  $res = $db->query($stmt);
  $output="";

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
  	$res->closeCursor(); // Termine le traitement de la requête
*/
  if ($q === "") {
    $stmt = "SELECT id_user, username, email FROM user";
    $res = $db->query($stmt);
    $output="";
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
    $output="";
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
  }
  $res->closeCursor(); // Termine le traitement de la requête

  /* close connection */

    echo($output); ?>
  </div>
</div>

</div>
