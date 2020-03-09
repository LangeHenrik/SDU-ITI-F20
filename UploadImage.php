<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/javascript" src="js/script.js">   
</script>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="content">
<div>
<div class="topnav">
    <a href="welcome.php">Home</a>
    <a href="UploadImage.php">Upload Image</a>
    <a href="SelectData.php">User List</a>
    <a href="login.php">Log out</a>
    
  </div>


<div>

<!-- delete script -->
<?php 
include("config.php");
if(isset($_GET['delete_id']))
{
  
  $stmt_select=$pdo->prepare('SELECT * FROM tbl_user WHERE id=:uid');
  $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
  $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
  unlink("uploads/".$imgRow['picProfile']);
  $stmt_delete=$pdo->prepare('DELETE FROM tbl_user WHERE id =:uid');
  $stmt_delete->bindParam(':uid', $_GET['delete_id']);
  if($stmt_delete->execute())
  {
    ?>
    <script>
    alert("You are deleted one item");
    window.location.href=('UploadImage.php');
    </script>
    <?php 
  }else 

  ?>
    <script>
    alert("Can not delete item");
    window.location.href=('login.php');
    </script>
    <?php 

}

?>
<!-- end delete script -->
<?php 

if(isset($_POST['btn-add']))
{
  $name=$_POST['user_name'];

  $images=$_FILES['profile']['name'];
  $tmp_dir=$_FILES['profile']['tmp_name'];
  $imageSize=$_FILES['profile']['size'];

  $upload_dir='uploads/';
  $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
  $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
  $picProfile=rand(1000, 1000000).".".$imgExt;
  move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
  $stmt=$pdo->prepare('INSERT INTO tbl_user(username, picProfile) VALUES (:uname, :upic)');
  $stmt->bindParam(':uname', $name);
  $stmt->bindParam(':upic', $picProfile);
  if($stmt->execute())
  {
    ?>
    
  <?php
  }else 

  {
    ?>
    <script>
      alert("Error");
      window.location.href=('.php');
    </script>
  <?php
  }

}
?>

<!-- form insert -->
<div class="container">
  <div >
    <h1 >Please Insert new Item image</h1>
    <form method="post" enctype="multipart/form-data">
      <label>Title</label>
      <input type="text" name="user_name"  required=""><br><br>
      <label>Your Image</label><br><br>
      <input type="file" name="profile" required="" accept="*/image">
      <button type="submit" name="btn-add">Add New </button>
      
    </form>
  </div>
  <hr style="border-top: 2px red solid;">
</div>	
<!-- end form insert -->
<!-- view form -->
<div >
<div >
  <div >
  <?php 
    $stmt=$pdo->prepare('SELECT * FROM tbl_user ORDER BY id DESC');
   
    

      $stmt->execute();
      if($stmt->rowCount()>0)
      {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
          extract($row);
          ?>
    <div >
    <p><?php echo $username ?></p></br>
    <img src="uploads/<?php echo $row['picProfile']?>"><br><br>

    <a  href="edit_form.php?edit_id=<?php echo $row['id']?>" title="click for edit" onlick="return confirm('Sure to edit this record')"><span class="glyphicon glyphicone-edit"></span>Edit</a>
    <a  href="?delete_id=<?php echo $row['id']?>" title="click for delete" onclick="return confirm('Sure to delete this record?')">Delete</a>
    
    </div>

    <?php 

      }
    }
    ?>
  </div>

</div>
</div>
<!-- end view form -->

</div>
</div>
</body>
</html>
