<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>

<body>
    <div class="navbar">
        <nav>
            <a href="/alhen20_chset20/mvc/public/home/login" class="active">Login</a>
            <a href="/alhen20_chset20/mvc/public/home/register">Register</a>
        </nav>
    </div>
    <div class="container">
        <div class="content">
            <div class="mainform">
                <form method="POST" action="/alhen20_chset20/mvc/public/home/login">
                    <input type="text" name="username" id="username" placeholder="Username"/>
                    <br/>
                    <input type="password" name="password" id="password" placeholder="Password"/>
                    <br/>
                    <input type="submit" name="login" id="login" value="Login"/>
                </form>
                <p> <?php echo $viewbag['error']; ?> </p>
            </div>
        </div>
    </div>
</body>

</html>
