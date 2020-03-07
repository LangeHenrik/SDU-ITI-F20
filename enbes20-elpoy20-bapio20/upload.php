<?php

session_start();
if(!isset($_SESSION['id'])){
   header("Location:index.php");
}

include('header.php');
ini_set('display_errors','on');
error_reporting(E_ALL);
include("config.php");

if (isset($_POST['formUpload'])) {
  //not necessary
  $user_idUp = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $user_id = htmlspecialchars($user_idUp);

  $headerUp = filter_var($_POST['header'], FILTER_SANITIZE_STRING);
  $header = htmlspecialchars($headerUp);

  $descriptionUp = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
  $description = htmlspecialchars($descriptionUp);

  $date=date("Y-m-d H:i:s");
  //$user_id =$_GET['id'];
  //$header =$_POST['header'];
  //$description =$_POST['description'];

  $name = $_FILES['file']['name'];
  if(!empty($header) AND !empty($description)) {

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
      //var_dump($stmt);
      $ok = "Upload completed !";


    }
    else {
      $error="Check your type file (" . $type . ") only ". implode (",",$typeOK) ." are allowed";
    }
  }
  else {
    $error= "Upload failed : You must fill the Header and Description";
  }
}
?>
<div class="uploadpage">

  <div class="container_upload" >
    <div class="title">UPLOAD PAGE</div>
    <form method="post" class="form" action="" enctype='multipart/form-data'>
        <!-- <p>Drag your picture here or click on this area</p> -->
        <input type="file" name="file" id="file" required="required" >
        <label for="header">Header</label>
        <input type='text' name='header'/>
        <label for="description">Description</label>
        <input type='text' name='description'/>

        <input type='submit' value='Upload Image' name='formUpload'>
        <?php
        if(isset($error)) {
            echo '<p id="verif_fail" >'.$error."</p>";
        }
        if(isset($ok)){
          echo '<p id="verif_ok" >'.$ok."</p>";

        }?>
    </form>
    </div>
  </div>
</div>

<?php include('footer.php') ?>
