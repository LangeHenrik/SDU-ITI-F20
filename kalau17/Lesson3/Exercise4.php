<?php
//session_start();
$logedin = false;
$error = "";

function loginForm()
{
    ?>
  <form class="login" name="login" id="login"  method="POST">
    <input type="text" name="username" value="">
    <br/>
    <input type="text" name="password" value="">
    <input type="submit">
  </form>
  <?php
}

function logout()
{
    ?>
<form class="logout" name="logout" id="logout"  method="POST">
  <input type="submit" value="Logout">
</form>
<?php
}


if ($_POST["username"] == "kasper" && $_POST["password"] == "ejby") {
    $logedin = true;
} elseif ($_POST["username"]) {
    $error = "Wrong username or password";
}


/*if($_Post["logout"]){
  $logedin = false;
}
*/

if (!$logedin) {
    loginForm();
} else {
    logout();
}

echo $error;



?>
