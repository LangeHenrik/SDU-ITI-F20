<html>
    <head>
    <script src="../js/js.js"></script>
    </head>
    <body>
        <div class="topnav">
            <a href="/yuhe20-visat20-jiyan20/ass2/mvc/public/User/login">Home</a>
            <a href="/yuhe20-visat20-jiyan20/ass2/mvc/public/User/register">Sign Up</a>
            <?php elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
            <a href="/yuhe20-visat20-jiyan20/ass2/mvc/public/Image/upload">Upload Image</a>
            <a href="/yuhe20-visat20-jiyan20/ass2/mvc/public/Image/loadImage">Feeds</a>
            <a href="/yuhe20-visat20-jiyan20/ass2/mvc/public/User/fetchAll">User List</a>
            <?php endif; ?>
            <?php 
                if(isset($_SESSION['username'])){
                    echo "<a href='logout.php'><input type=button value=Logout name=logout></a>";
                } else { ?>
                    <div class="login-container">    
                        <form name="login" action="feed.php" method="POST">
                            <input type="text" name="username-login" id="username-login" placeholder="Username">
                            <input type="password" name="pwd-login" id="pwd-login" placeholder="Password">
                            <button type="submit" name="login-submit">Log-in</button>
                        </form>
                    </div>
            <?php } ?>
        </div>
    </body>