<!DOCTYPE html>
<html>

<head>
    <title>Create Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="../js/javascript.js"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/stylesheet.css">
    <html lang="en">
</head>

<body>
    <div class="div-form">
        <form class="form" onblur="" onsubmit="return checkform();" method="POST" action="/jacso18/mvc/public/home/create_account">
            <div class="field-name">
                <i class="fas fa-user"></i>
                <input type="text" name="username" id="username" placeholder="Username" title="Must not contain special characters" onkeyup="checkname()" onchange="checkname()" onblur="checkname()" />
            </div>
            <div class="field-password">
                <i class="fas fa-key"></i>
                <input type="password" name="password" id="password" placeholder="Password" title="minimum 8 characters" onkeyup="checkpassword()" onchange="checkpassword()" onblur="checkpassword()" />
            </div>
            <div class="field-email">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" id="email" placeholder="Email" onkeyup="checkMail()" onchange="checkMail()" onblur="checkMail()" />
            </div>
            <div class="button-submit">
                <input type="submit" name="submit" id="submit" value="Create" />
            </div>
            <div class="link-index">
                <a href="/jacso18/mvc/public/home/login">back</a>
            </div>
            <div class="form-response">
                <p><?php  ?></p>
            </div>
        </form>
    </div>

</body>

</html>