<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styling.css">
    <title>Registration</title>
</head>
<body>

        <div class="content" id="registration">
            <h1>Registration</h1>
                <form onKeyUp="return checkFields()" method="POST" action=>
                    <fieldset>            
                        <legend>Registration for system:</legend>   
                        <label for = "username">Username: </label>
                        <p id="usernameStatus"> </p>
                        <br>
                        <input type="text" name="username" id="username" placeholder="Write username here" autofocus required>
                        <br>
                        <label for = "password">Password: </label>
                        <br>
                        <p id="passwordStatus"> </p>
                        <input type="password" name="password" id="password" placeholder="Write password here" required >
                        <br>
                        <label for = "password2">Retype password: </label>
                        <br>
                        <p id="password2Status"> </p>
                        <input type="password" name="password2" id="password2" placeholder="Write password again" required >
                        <br>
                        <input type="Submit" name="submit" value="Register" id="submit">
                        
                        
                    </fieldset>
                </form>
            <p>If you are having trouble registering, please contact support.</p>
            <br>
        </div>
    <script src="regExRegistration.js"></script>
</body>
</html>

<?php
session_start();
if(isset($_SESSION['username'])){
    //echo "<h2>Welcome to Product page</h2>";
    echo "<br><a href='index.php'><input type=button name=back value=Back ></a>";
}
else{
    echo "<script>location.href='index.php'</script>";
}


?>