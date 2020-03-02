<?php
include('header.php');
ini_set('display_errors','on');
error_reporting(E_ALL);

include("config.php");

$date=date("Y-m-d H:i:s");
$user_id =$_GET['id'];
$header =$_POST['header'];
$description =$_POST['description'];

if(isset($_POST['submit_upload'])){

  $name = $_FILES['file']['name'];

  // Type of the uploaded file
  $type = strtolower(pathinfo($name,PATHINFO_EXTENSION));
  //Check if allowed in array
  $typeOK = array("jpg","jpeg","png","gif");

  //$data = file_get_contents($name);

  //check if extension exists in array()
  if(in_array($type,$typeOK)){
    $img64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
    $image = 'data:image/'.$type.';base64,'.$img64;
    //$base64 = 'data:image/' . $type . ';base64,' . base64_encode(file_get_contents($_FILES['file']['tmp_name']));

    $stmt= $db->prepare("INSERT INTO images (image, header, description, created, user_id) VALUES ( ?, ?, ?, ?, ?)");
    $stmt->execute(array($image, $header, $description,$date ,$user_id));
  }
}
?>
<div class="uploadpage">
  

  <div class="container" >
    <div class="title">UPLOAD PAGE</div>
    <form method="post" class="form" action="" enctype='multipart/form-data'>
        <input type="file" name="file" id="file" required="required">
        <label for="header">Header</label>
        <input type='text' name='header' />
        <label for="description">Description</label>
        <input type='text' name='description' />
        <?php echo $description ?>

        <input type='submit' value='Upload Image' name='submit_upload'>
    </form>
    </div>
  </div>
</div>
