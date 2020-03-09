<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="styling.css">
</head>

<body>

    <form class="userlist" name="userlist" method="GET" action="userlist.php">
        <p>
        <input type="submit" onclick="loadDoc()" name="userlist" id="ulbtn" value="Userlist">
        <p class="ulbtn" id=ulbtn></p>
        </p>
    </form>

    <form class="uploadImage" name="uploadImage" method="POST" action="uploadimage.php">
        <p>
        <input type="submit" name="uploadImage" id="uloadbtn" value="Upload Picture">
        </p>
    </form>

    <script src="extfiles/userlist.js "></script>


</body>
</html>