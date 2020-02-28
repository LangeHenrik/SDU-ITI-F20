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
            <form method="POST" action=>
                <fieldset>            
                    <legend>Registration for system:</legend>   
                    <label for = "username">Username: </label>
                    <br>
                    <input type="text" name="username" placeholder="Write username here" autofocus>
                    <br>
                    <label for = "password">Password: </label>
                    <br>
                    <input type="password" name="password" placeholder="Write password here" >
                    <br>
                    <label for = "password2">Retype password: </label>
                    <br>
                    <input type="password" name="password2" placeholder="Write password again" >
                    <br>
                    <input type="Submit" name="submit" value="Register">
                    
                </fieldset>
            </form>
        <p>If you are having trouble registering, please contact support.</p>
    </div>
</body>
</html>