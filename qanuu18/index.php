<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styling.css">
</head>

<body>
    <h1>Sign In or Sign Up</h2>
    <div id="frm">
        <form class="login" name="frontpage" method="POST" action="login.php">
            <p>
                <label>Username:</label>
                <input type="text" id="user" name="username">
            </p>
            <p>
                <label>Password:</label>
                <input type="password" id="pass" name="password">
            </p>
            <p>
                <input type="submit" name="login" id="btn" value="Login">
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