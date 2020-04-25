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
            <div class="inputWithIcon">
                <i class="fas fa-user"></i>
                <input type="text" name="username" id="username" placeholder="Username"  onkeyup="checkname()" onchange="checkname()" onblur="checkname()" />
                <i class="fas fa-question-circle" title="Must not contain special characters"></i>    
            </div>
            <div class="inputWithIcon">
                <i class="fas fa-key"></i>
                <input type="password" name="password" id="password" placeholder="Password"  onkeyup="checkpassword()" onchange="checkpassword()" onblur="checkpassword()" />
                <i class="fas fa-question-circle" title="minimum 8 characters"></i>
            </div>
            <div class="inputWithIcon">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" id="email" placeholder="Email" onkeyup="checkMail()" onchange="checkMail()" onblur="checkMail()" />

            </div>
            <div class="button"><input type="submit" name="submit" id="submit" value="submit" /></div>
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