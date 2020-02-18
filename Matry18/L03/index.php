<html>
    <head>
        <title>PHP Post Form User Login</title>
    </head>
    <body>
        <div id="main">
            <center>
                    <h1>User login</h1>
                    <form method="POST">            
                        <legend>Fill in the form to log in:</legend>   
                        <label for="username">Username:</label>
                        <input type="text" name="username" autocomplete="off" required>
                        
                        <label for="password">Password:</label>
                        <input type="password" name="password" required>
                        <br>
                        <input type="Submit" name="submit" value="Login" id="submit"/>
                    </form>
                </center>
        </div>
    </body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $un=$_POST['username'];
        $pw=$_POST['password'];
        $wrongpw="Invalid password!";
        $wrongun="Invalid username!";

        if ($un=='username' && $pw=='password') {
            header("location:home.html");
            exit();
        } elseif ($un != 'username' && $pw == 'password') {
           echo "<p align=center>$wrongun</p>";
        } elseif ($un=='username' && $pw!='password') {
           echo "<p align=center>$wrongpw</p>";
        }
        else
            echo "<p align=center>$wrongun And $wrongpw </p>";
    }

?>


