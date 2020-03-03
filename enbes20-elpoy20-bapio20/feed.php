<?php

session_start();
if(!isset($_SESSION['id'])){
   header("Location:index.php");
}
include('header.php');


require('config.php');

$stmt = "SELECT * FROM images ORDER BY created";
$res = $db->query($stmt);
$output="";

while ($row = $res->fetch()){
			$output = $output . "
			<div>
				<div>
					<h3>". $row['header'] ."</h3>
				</div>
				<div>
				<img src=".$row['image'] ." >
				<p class='text-article'>" . $row['description'] ."</p></div>
				<div>".$row['created']."</div>
		</div>
			";
}
$res->closeCursor(); // Termine le traitement de la requête

?>


<!-- NEWS SECTION -->
<h1>Images Feed</h1>

<?php echo($output);?>

<?php include('footer.php') ?>
