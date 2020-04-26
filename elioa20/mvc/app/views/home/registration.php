<!DOCT••••••YPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../../../../../favicon.ico" />
    <title>Welcome to Odin's Blog | Register</title>
    <link rel="stylesheet" type="text/css" href="/elioa20/mvc/public/css/registerStylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<form class="register-form" method="post">
    <div class="register-form-container">

        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>

        <ul id="register-messages">

        </ul>

        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" id="username" name="username" placeholder="Username">
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" id="password" name="password1" placeholder="Password">
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" id="password2" name="password2" placeholder="Repeat Password">
        </div>

        <div class="register-button-container">
            <input type="button" class="btn1" id="register" name="register" value="Register">
            <a href="/elioa20/mvc/public/home/index"><input type="button" class="btn" id="login" name="login" value="Back"></a>
        </div>
    </div>
</form>

<script type="text/javascript" src="/elioa20/mvc/public/js/register.js"></script>
</body>
</html>