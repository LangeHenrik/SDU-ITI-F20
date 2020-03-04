<!DOCTYPE html>

<?php
echo "<br><a href='log-out.php'><input type=button value=Logout name=logout></a>";
?>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="loginpage.css">
</head>

<body>
    <div id="frm">
        <form class="login" name="login" method="POST" action="startside.php">
            <p>
                <label>Username:</label>
                <input type="text" id="user" name="user">
            </p>
            <p>
                <label>Password:</label>
                <input type="password" id="pass" name="pass">
            </p>
            <p>
                <input type="submit" id="btn" value="Login">
            </p>
        </form>
    </div>    
</body>
</html>