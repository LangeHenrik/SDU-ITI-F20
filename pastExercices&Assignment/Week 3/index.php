<html>
<body>
    <h1>Login</h1>

    <form method="POST" target="_blank">
        <label for="username">username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="login">
    </form>

    <?php
    $username = "Test";
    $password = "abcd";
    ?>
    Welcome 
    <?php echo $_POST["username"]; ?>
    <br>
    Your password is: <?php echo $_POST["password"]; ?>

</body>
</html>
