<html>
    <head>
    <script src="../js/js.js"></script>
    </head>
    <body>

<div style="background-color: lightblue;">Menu partial view</div>

<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>

<a href="/qanuu18/mvc/public/user/logout">log out</a>


<?php endif; ?>


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

    <script src="public/userlist.js"></script>


</body>
</html>
