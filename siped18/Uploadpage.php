<!DOCTYPE html>
<html>
<head>
    <title>Semester feed</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar">
    <a href="Frontpage.php">Front page</a>
    <a href="Registrationpage.php">Registration</a>
    <a href="Imagepage.php">Images</a>
    <a href="Uploadpage.php">Upload</a>
    <a href="Userlist.php">Users</a>
    </div>

    <div class="login-page">
        <div class="form">
            <h1 class="text-center">Please insert new image</h1>
            <form method="post" action='' enctype="multipart/form-data">
                <label>Username</label>
                <input type="text" name="user_name" class="from-control" required=""><br>
                <label>Image</label> 
                <input type="file" name="profile" class="from-control" required="" accpet= "*/image" multiple><br>
                <button type='submit' name='submit'>Add new image</button>
            </form>
        </div>
    </div>

<?php 
    include ("db_config.php");

    if (isset($_POST['submit'])) {
        $name=$_POST['user_name'];
        $imgaes = $_FILES['profile']['name'];
        $tmp_dir = $_FILES['profile']['tmp_name'];
        $imagesSize = $_FILES['profile']['size'];

        $upload_dir = 'uploads';
        $imgExt = strtolower(pathinfo($imgaes, PATHINFO_EXTENSION));
        $valid_ext = array("png","jpeg","jpg");
        $picProfile = rand(10000, 1000000).".".$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
        $stmt=$conn->prepare('INSERT INTO images (name,image) VALUES(:username, :upic)');
        $stmt->bindParam(':username', $name);
        $stmt->bindParam(':upic', $picProfile);

        if ($stmt->execute()) {
            ?> 
            <script>
                alert("new record succesfull");
                window.location.href=('uploadpage.php');
            </script>
        <?php
        } else {
            ?> 
            <script>
                alert("Error");
                window.location.href=('uploadpage.php');
            </script>
        <?php
    }
}
    
?>
      
</body>
</html>