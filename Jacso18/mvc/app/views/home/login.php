<!DOCTYPE html>
<html lang="en">

<head>
    <title>login page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../CSS/stylesheet.css">
    <html lang="en">
</head>

<body>
    <div class="div-form">
        <form class="form" method="POST" action="/jacso18/mvc/public/home/login">
            <div class="inputWithIcon">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Username" id="username" />

            </div>
            <div class="inputWithIcon">
                <i class="fas fa-key"></i>
                <input type="password" name="password" placeholder="Password" />

            </div>
            <div class="button"><input type="submit" name="login" id="login" value="login" /></div>
            <a href="/jacso18/mvc/public/home/create_account">create account</a>
            <p> <?php echo $viewbag['error']; ?> </p>
    </div>

    </form>
    </div>
</body>

</html>