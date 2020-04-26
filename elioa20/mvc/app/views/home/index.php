<!DOCT••••••YPE html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to Odin's Blog</title>
    <link rel="icon" type="image/gif" href="../../../../../favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="/elioa20/mvc/public/css/loginStylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<form class="login-form" method="post">
    <div class="login-form-container">

        <h1>Odin's Blog</h1>

        <ul id="login-messages">

        </ul>

        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" id="username" name="username" placeholder="Username">
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" id="password" name="password" placeholder="Password">
        </div>

        <div class="buttons-container">
            <input type="button" class="btn1" id="login" name="login" value="Log In">
            <h2><span>or</span></h2>
            <a href="/elioa20/mvc/public/home/registration"><input type="button" class="btn" id="register" name="register" value="Register"></a>
        </div>
    </div>
</form>

<script type='text/javascript' src="/elioa20/mvc/public/js/login.js"></script>
</body>
</html>