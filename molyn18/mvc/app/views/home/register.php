<?php include '../app/views/partials/head.php';

$regex_password = "^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"

?>
    <div class="box">
        <h1>Register</h1>
        <form action="#" id="register" method="post">
            <input type="text" name="username" placeholder="Username" autocomplete="username" autofocus>
            <input type="password" autocomplete="new-password" pattern="<?php echo $regex_password; ?>"
                   title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                   name="password" placeholder="Password" required>
            <input type="password" autocomplete="new-password" pattern="<?php echo $regex_password; ?>"
                   name="repeat-password" placeholder="Repeat Password" required>
            <p id="error"> </p>
            <br/>
            <button class="form-button" type="submit"><span>Register</span></button>
        </form>
        <hr>
        <a href="/molyn18/mvc/public/Home/login">Already have an account?</a>
    </div>
    <script src="/molyn18/mvc/public/js/signup.js"></script>
<?php include '../app/views/partials/foot.php'; ?>