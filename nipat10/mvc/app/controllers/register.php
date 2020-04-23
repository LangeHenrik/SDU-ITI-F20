<?php

//Require the header page.
require 'header.php';

//Require the database connection file.
require 'config.php';


//If the user has pressed the register button and the post method "register" has been submitted.
if (isset($_POST['register'])) {

    //Retrieve the field values from our registration form.    
    $username = strip_tags($_REQUEST['username']);
    $password = strip_tags($_REQUEST['password']);
    if ($username == "" || $password == "") {
?>
        <script>
            //If it does, alert user and redirect back to the registration page.
            alert("invalid username");
            window.location.href = ('register.php');
        </script>
    <?php
    }
    //Prepare a sql SELECT statement to check whether username already exists in the database.
    $sql = "SELECT username FROM users WHERE username=:username";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //Now, we check if the supplied username already exists.
    if ($row["username"] === $username) {
    ?>
        <script>
            //If it does, alert user and redirect back to the registration page.
            //alert("User already exists");
            //window.location.href = ('register.php');
        </script>
    <?php
        exit;
    }

    //Hash the password as we do NOT want to store our passwords in plain text.
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //Prepare a sql INSERT statement, to add a new user to the database.
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $db->prepare($sql);

    //Bind our variables.
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $hashed_password);

    //Execute the statement and insert the new user account.
    $result = $stmt->execute();

    //Check whether the INSERT query was successful.
    if ($result) {
        //User registered. Alert and redirect them back to the frontpage.
    ?>
        <script>
            alert("Succesfully registered!");
            window.location.href = ('index.php');
        </script>
    <?php
        exit;
    } else {
        //If there was a problem with the INSERT query, alert the user and redirect back to registration page.
    ?>
        <script>
            alert("A problem has occured during registration!");
            window.location.href = ('register.php');
        </script>
<?php
    }
}

?>

<div class="main" align="center">
    <?php
    //Check whether user is logged in or not.
    //If user is logged in, show message.
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo '<p>You are already registered as "' . "$username" . '" please log out to register another user</p>';
    } else {
        //If user is not logged in, show the register form
        echo '<div class="wrapper" id="loginform" >
            <h2> Register form</h2>
                <!-- Register form that calls the document itself (register.php) and sends the information via POST. --->
                <form action="register.php" method="post" onsubmit="validate(this)">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" autocomplete="off" required placeholder="username"><br>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" autocomplete="off" required placeholder="Password"><br>
                    <input type="submit" name="register" value="Register"></button>
                </form>
    
            </div>';
    }

    ?>
</div>

<?php
//Include the footer page.
include 'footer.php';
?>