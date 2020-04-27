

<head>
    <link rel="stylesheet" href="<?php echo DOC_ROOT; ?>/css/styling.css">
</head>

<body>
    <h1>Sign In or Sign Up</h2>
    <div id="frm">
        <form class="login" name="frontpage" method="POST" action="/qanuu18/mvc/public/home/login">
            <p>
                <label>Username:</label>
                <input type="text" id="username" name="username">
            </p>
            <p>
                <label>Password:</label>
                <input type="password" id="password" name="password">
            </p>
            <p>
                <input type="submit" name="login" id="btn" value="Login">
            </p>
        </form>
        <form class="registration" name="registration" method="POST" action="/qanuu18/mvc/public/home/registration">
            <p>
                <input type="submit" id="btn" value="Registration">
            </p>
        </form>
    </div>    

</body>

</html>