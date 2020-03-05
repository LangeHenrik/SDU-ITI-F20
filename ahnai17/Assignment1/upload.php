<?php
    echo "<br/>upload.php running";
    if(isset($_FILES['image'])){
        echo "<br/>file found...";
      $errors= array();
      $target_file = "upload/" . basename($_FILES["image"]["name"]);
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $extensions= array("jpeg","jpg","png");
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,'uploads/'.$file_name);
         echo "<div id=\"x\">uploaded file</div>";
      }else{
          echo "errors: ";
         print_r($errors);
      }
   }






