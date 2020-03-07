<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Frontpage</title>
    <meta name="viewport" content="width=device width, initial scale=1.0">
<!--    main css-->
    <link rel="stylesheet" type="text/css" href="style.css">
<!--    awesome font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php error_reporting(E_ALL)?>

<div class="header">
    <h1>Login</h1>
</div>

<div id="form" class="login_form">
    <a href="registration.php">Registration</a>
<!--    todo change action-->
    <form onsubmit="return checkform();" action="omg.html" method="post">
        <label for="name">name:</label>
        <input type="text" id="name" name="name"><br>
        <p class="info" id="nameinfo"></p><br><br>
        <label for="pass">password:</label>
        <input type="password" id="pass" name="pass"><br>
        <input type="submit" value="login"><br>
        <p class="info" id="passinfo"></p><br>
    </form>
</div>

<div class="footer">
    <p>@Josef Sanda</p>
</div>
</body>
</html>