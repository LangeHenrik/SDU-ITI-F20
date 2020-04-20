
<?php

session_start();

if(isset($_SESSION['username'])){
    echo "<br><a href='logout.php'><input type=button value=Logout name=logout></a>";
}
else{
    echo "<script> alert('Please login to procede! Please check your credentials.') </script>";
    echo "<script> location.href = 'index.php' </script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="extfiles/styling.css">
</head>

<body>
       

    <div id="userlistbtn">
    </div>
    
    <form class="viewimage" name="viewimage" method="POST" action="Viewimage.php">
        <p>
        <input type="submit" name="Viewimage" id="viewimagebtn" value="View Images">
        </p>
    </form>

    <form class="uploadImage" name="uploadImage" method="POST" action="uploadimage.php">
        <p>
        <input type="submit" name="uploadImage" id="uloadbtn" value="Upload Picture">
        </p>
    </form>

    <p>
        <button onclick="loadDoc()" name="userlist" id="ulbtn"  >Userlist</button>
        <p class="ulbtn" id="display"></p>
        </p>

    <script src="extfiles/userlist.js "></script>


</body>
</html>