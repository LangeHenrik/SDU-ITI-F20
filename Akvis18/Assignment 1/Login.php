<?php
    $title = "Login";
    include_once "Shared/Navbar.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $user = htmlentities($_POST["username"]);
        $pass = htmlentities($_POST["password"]);

        include_once "Shared/DBConnect.php";

        $r = query("SELECT user_id, username, password FROM user WHERE username = ? ;", [$user]);
        if (password_verify($pass, $r[0]['password'])) {
            $_SESSION['LoggedIn'] = true;
            $_SESSION['id'] = $r[0]['user_id'];
            $_SESSION['username'] = $r[0]['username'];
            header('Location: /Feed.php');
        } else {
            echo "Wrong credentials";
        }
    }
}
?>
<div class="center container">
    <form method="post">
        <fieldset>
            <legend>Login to Facewall</legend>
                <label for="username">Username</label> <br>
                <input type="text" name="username" placeholder="Username"> <br/>
                <label for="password">Password</label> <br>
                <input type="password" name="password" placeholder="Password"><br/>
                <button type="submit">Submit</button> <hr/>
                Don't have a user? Make one <a href="/Register.php">here</a>.
        </fieldset>
    </form>
</div>

</body>
</html>