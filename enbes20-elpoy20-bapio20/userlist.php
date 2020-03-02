<?php
include('header.php');
ini_set('display_errors','on');
error_reporting(E_ALL);
include("config.php");

$stmt = "SELECT id_user, username, email FROM user";
$res = $db->query($stmt);
$output="";

while ($row = $res->fetch()){
			$output = $output . "
			<div>
					<div>". $row['id_user'] ."</div>
					<div>". $row['username'] ."</div>
				 	<div>". $row['email'] ."</div>
				</div>
		";
}
	 $res->closeCursor(); // Termine le traitement de la requête

/* close connection */

?>
<div class="container">

<h1>All contacts</h1>

	<?php echo($output); ?>

</div>
