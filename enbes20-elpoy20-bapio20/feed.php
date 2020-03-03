<?php

session_start();
if(!isset($_SESSION['id'])){
   header("Location:index.php");
}

include('header.php');


require('config.php');
$stmt="SELECT * FROM user INNER JOIN images ON user.id_user = images.user_id ORDER BY created DESC";
$res = $db->query($stmt);
$output="";
while ($row = $res->fetch()){
			$output = $output . "
			<div class='card'>
				<div class='card_title title-white'>
					<p>". $row['header'] ."</p>
				</div>
				<div class='card_image'>
				<img src=".$row['image'] ." >
				</div>
        <p class='text-article'>" . $row['description'] ."</p>
				<div>".$row['created']."</div>
        <div>Upload by:".$row['username']."</div>

		</div>
			";
}
$res->closeCursor(); // Termine le traitement de la requête

?>


<!-- NEWS SECTION -->
<div class="container_feed">


  <div class="title">Images Feed</div>
    <div class="cards-list">

    <?php echo($output);?>
    </div>
</div>

<?php include('footer.php') ?>
