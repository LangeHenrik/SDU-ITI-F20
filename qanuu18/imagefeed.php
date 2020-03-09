<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="extfiles/styling.css">
</head>

<body>

    <form class="userlist" name="userlist" method="GET" action="userlist.php">
        <p>
        <input type="button" onclick="loadDoc()" name="userlist" id="ulbtn" value="Userlist">
        <p class="ulbtn" id="display"></p>
        </p>
    </form>

    

    <div id="userlistbtn">
    </div>

    <form class="uploadImage" name="uploadImage" method="POST" action="uploadimage.php">
        <p>
        <input type="submit" name="uploadImage" id="uloadbtn" value="Upload Picture">
        </p>
    </form>

    <script src="extfiles/userlist.js "></script>


</body>
</html>