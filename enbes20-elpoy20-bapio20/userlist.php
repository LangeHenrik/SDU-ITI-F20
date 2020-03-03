<?php
session_start();
if(!isset($_SESSION['id'])){
   header("Location:index.php");
}

include('header.php');
ini_set('display_errors','on');
error_reporting(E_ALL);
include("config.php");

$stmt = "SELECT id_user, username, email FROM user";
$res = $db->query($stmt);
print_r($res);
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

/* close connection */

?>
<div class="container_userlist">

<div class="title">Contact List</div>
  <form class="search">
    Username: <input type="text" onkeyup="showHint(this.value)">
  </form>
  <div class="contact_list">
	   <?php echo($output); ?>
  </div>
</div>

</div>

<?php // get the q parameter from URL

$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $username) {
        if (stristr($q, substr($username, 0, $len))) {
            if ($hint === "") {
                $hint = $username;
            } else {
                $hint .= ", $username";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>
