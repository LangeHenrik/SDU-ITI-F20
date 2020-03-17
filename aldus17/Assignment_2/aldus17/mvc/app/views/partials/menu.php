<html>

<head>
    <script src="../js/js.js"></script>
</head>

<body>

    <div style="background-color: lightblue;">Menu partial view</div>

    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>

        <div class="navbar" id="navbar">

            <ul>
                <li><a class="active" href="#homepage">Home</a></li>
                <li> <a href="upload_page.php">Upload</a></li>
                <li> <a href="imagefeed_page.php">Imagefeed</a></li>
                <li> <a href="userlist_page.php">Userlist</a></li>
                <li>
                    <form method="post">
                        <div class="inner_container">
                            <button class="logoutbtn" name="logoutbtn" type="submit"><a href="/aldus17/mvc/public/user/logout">log out</a></button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>

    <?php else : ?>

        <form method="post" id="loginForm">
            <div class="inner_login_form_container">
                <h1>Login page</h1>
                <label>Username: </label>
                <input type="text" name='username' id='username' placeholder='Type username' />

                <label>Password: </label>
                <input name='password' id="password" type='password' placeholder='Type password' />
                <input type='submit' name='loginbtn' class="loginbtn" id="loginbtn" value='login' />
               <a href="/aldus17/mvc/public/user/logout"> <button type="button" name="registerReferBtn" class="registerReferBtn" id="registerReferBtn" >Register</button></a>
            </div>

        <?php endif; ?>