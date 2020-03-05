<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="style.css" >
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">About me</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>

                <div>
                    <form action="includes\login.php" method="post">
                        <input type="text" name="mailuid" placeholder="Username">
                        <input type="password" name="pwd" placeholder="Password">
                        <button type="submit" name="login-submit">Log-in</button>
                    </form>
                    <a href="signup.php">Sign-up</a>
                    <form action="includes\logout.php" method="post">
                    <button type="submit" name="logout-submit">Log-out</button>
                    </form>
                </div>
            </nav>
        </header>
    </body>
</html>