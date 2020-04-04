<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Odin's Blog</title>
    <link rel="stylesheet" type="text/css" href="/elioa20/mvc/public/css/loginStylesheet.css">
</head>
<body>

<form class="login-form" method="post">
    <div class="login-form-container">
        <h1>Welcome to Odin's Blog!</h1>
        <p>Here you can post photos from all over Odense and share your experiences!</p>

        <ul id="login-messages">

        </ul>

        <input type="text" id="username" name="username" placeholder="Username...">
        <input type="password" id="password" name="password" placeholder="Password...">

        <div class="buttons-container">
            <input type="button" id="login" name="login" value="Log In">
            <a href="/elioa20/mvc/public/home/registration"><input type="button" id="register" name="register" value="Register"></a>
        </div>
    </div>
</form>

<script type='text/javascript' src="/elioa20/mvc/public/js/login.js"></script>

</body>
</html>