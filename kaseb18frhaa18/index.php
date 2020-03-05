<?php
//start session
session_start();

//db config
require_once "database.php";

//check if already logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: imagefeed.php");
    exit;
}

//define varriable
$username = $password = $name = "";
$username_err = $password_err = "";

//form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
    }

    //check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter password.";
    } else {
        $password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);
    }

    //validate data
    if (empty($username_err) && empty($password_err)) {
        // Prepare a statement
        try {
            $sql = 'SELECT person_id, name, username, passwordHash FROM person WHERE username = :username';
            $parameters = array(array(":username", $username));
            $stmt = talkToDB($sql, $parameters);
            // Check if username exists, if yes then verify password
            if (count($stmt) == 1) {
                $row = $stmt[0];
                $id = $row["person_id"];
                $username = $row["username"];
                $name = $row["name"];
                $hashed_password = $row["passwordHash"];
                if (password_verify($password, $hashed_password)) {
                    // Password is correct, so start a new session
                    session_start();

                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $username;
                    $_SESSION["name"] = $name;

                    // Redirect user to welcome page
                    header("location: registration.php");
                } else {
                    // Display an error message if password is not valid
                    $password_err = "The password you entered was not valid.";
                }
            } else {
                // Display an error message if username doesn't exist
                $username_err = "No account found with that username.";
            }


            // Close statement

        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    // Close connection
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic.html -->
    <title>Title of the document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="myscripts.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8" />
</head>

<body>
    <div class="wrapper">
        <div class="menu">
            <h2>Menu</h2>
            <ul>
                <li> <a href=index.php>Login</a></li>
                <li> <a href=registration.php>Register</a></li>
                <li> <a href=uploadpage.php>Upload</a></li>
                <li> <a href=ImageFeed.php>Image Feed</a></li>
                <li> <a href=User_List.php>User List</a></li>
            </ul>
        </div>
    </div>

    <div class="wrapper">
        <div class="content">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h1>Login</h1>
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <input type="text" name="username" placeholder="Username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <a>Not registered? <a id="createaccount" href="registration.php">Create an Account now!</a></a>
                <button type="submit" class="btn btn-primary" value="Login">Log In</button>
            </form>
        </div>
    </div>

</body>

</html>