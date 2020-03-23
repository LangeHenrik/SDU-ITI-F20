<!DOCTYPE html>

<header>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registration_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <html lang="en">

</header>

<body>
    <form method="POST" action="/aldus17/mvc/public/home/login" id="loginForm">
        <div class="inner_login_form_container">
            <h1>Login page</h1>
            <label>Username: </label>
            <input type="text" name='username' id='username' placeholder='Type username' />

            <label>Password: </label>
            <input name='password' id="password" type='password' placeholder='Type password' />
            <input type='submit' name='loginbtn' class="loginbtn" id="loginbtn" value='login' />
            <a href="/aldus17/mvc/public/home/register"> <button type="button" name="registerReferBtn" class="registerReferBtn" id="registerReferBtn">Register</button></a>
        </div>
    </form>
</body>

</html>