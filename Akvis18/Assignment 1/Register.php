<?php
$title = "Create new user";
include_once 'Shared/Navbar.php';
include_once 'Shared/DBConnect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once 'Shared/GetFormData.php';
    $username_regex = '/^[A-Za-zÆØÅæøå _\-\d]{3,}$/';
    $email_regex = '/^\S+@\S+\.[a-z|A-Z]{2,10}$/';
    $pass_regex = '/^(?=.*[a-zæøå])(?=.*[A-ZÆØÅ])(?=.*\d)(?=.*[@$!%*?&])[A-Za-zÆØÅæøå\d@$!%*?&]{8,}$/';
    $errors = array();
    $username = $avatar = $email = $password = "";

    $username = getAndMatchPost('username', $username_regex);
    $email = getAndMatchPost('email', $email_regex);
    $password = getAndMatchPost('password', $pass_regex);
    $sec_password = getAndMatchPost('second-password', $pass_regex);
    $avatar = getImage('avatar');

    if (!$password === $sec_password) {
        $errors[] = 'Passwords don\'t match';
    }

    $r = query("SELECT COUNT(*) FROM user WHERE username = ? or email = ?;", [$username, $email]);
    if (empty($errors) && $r[0]['COUNT(*)'] == 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        query('INSERT INTO user (username, email, password, avatar) VALUES (?, ?, ?, ?);', [$username, $email, $password, $avatar]);

        $r = query("SELECT user_id, username FROM user WHERE username = ? ;", [$username]);
        $_SESSION['LoggedIn'] = true;
        $_SESSION['id'] = $r[0]['user_id'];
        $_SESSION['username'] = $r[0]['username'];
        header('Location: /Feed.php');
    }
}
?>
<div class="center container">
    <form onsubmit="return CheckForm();" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Create new Facewall user: </legend>
            <label for="username">Username</label> <br/>
            <input type="text" name="username" id="username" required/> <br/>
            <p class="info" id="username-availability"></p>
            <p class="info" id="username-info"></p>

            <label for="avatar">Upload profile picture</label> <br/>
            <input name="avatar" id="avatar" type="file" /><br/>

            <label for="email">Email</label> <br/>
            <input type="email" name="email" id="email" required/> <br/>
            <p class="info" id="email-availability"></p>
            <p class="info" id="email-info"></p>

            <label for="password">Password</label> <br/>
            <input type="password" name="password" id="password" required/> <br/>
            <p class="info" id="password-info"></p>

            <label for="password">Please repeat the password</label> <br/>
            <input type="password" name="second-password" id="second-password" required/> <br/>
            <p class="info" id="second-password-info"></p>
            <input type="checkbox" onclick="ShowPass()">Show Passwords<br/>

            <button type="submit" name="submit" id="submit">Create new user</button> <hr/>
            <a href="/Login.php">Already have a user?</a>
        </fieldset>
    </form>
    <?php
    global $errors;
    if (isset($errors)){
        foreach ($errors as $error){
            print $error . '<br/>';
        }
    }
    ?>
</div>
<script src="Scripts/UsernameAvailable.js"></script>
<script src="Scripts/EmailAvailable.js"></script>
<script src="Scripts/RegisterValidation.js"></script>