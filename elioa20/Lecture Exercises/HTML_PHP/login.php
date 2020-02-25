<form method="post" action="">
    <label> Name
        <input type="text" name="username">
    </label>
    <label> Password
        <input type="password" name="password">
    </label>
    <input type="submit" name="submit">
</form>
<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['submit'])){

    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';

    $password = htmlspecialchars($password);
    $username = htmlspecialchars($username);

    /* Check Username and Password existence in defined array */
    if ($username=="eioake01" && $password=="1234a"){
        /* Success: Set session variables and redirect to Protected page  */
        $_SESSION["logged_in"] = true;
        header("Location:register.php");
        exit;
    } else {
        $_SESSION["logged_in"] = false;
        /*Unsuccessful attempt: Set error message */
        $msg="<span style='color:red'>Invalid Login Details</span>";
        echo $msg;
    }
}
