<!DOCTYPE html>

<head>
    <title>Sign In or Sign Up</title>
    <link rel="stylesheet" href="loginpage.css">
</head>

<body>
    <div id="frm">
        <form class="login" name="login" method="POST" action="login.php">
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
        <form class="registration" name="registration" method="POST" action="registrationpage.php">
            <p>
                <input type="submit" id="btn" value="Registration">
            </p>
        </form>
    </div>    
</body>
</html>
