<?php
error_reporting(E_ALL);
require_once 'sanitize_input.php';
require_once 'db_config.php';
?>

<div class="header">
    <h1>Login</h1>
</div>

<form method="post">
    <input type="submit" name="button_logout"
           class="button_logout" value="Logout"/>
</form>

<?php
if (isset($_POST['button_logout'])) {
    echo "This is Button1 that is selected";
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
}

?>

<div id="form" class="login_form">
    <a href="registration.php">Registration</a>
    <!--    todo change action-->
    <form onsubmit="return checkform();" action="login.php" method="post">
        <label for="name">name:</label>
        <input type="text" id="name" name="name"><br>
        <p class="info" id="nameinfo"></p><br><br>
        <label for="pass">password:</label>
        <input type="password" id="pass" name="pass"><br>
        <input type="submit" value="login"><br>
        <p class="info" id="passinfo"></p><br>
    </form>
    <script src="registration_form.js"></script>
</div>

<?php
if (!empty($_POST) && $_POST["name"] != NULL && valid_human_name($_POST["name"]) && valid_password($_POST["pass"])) {
    $user_register = $_POST["name"];
    $pass_register = $_POST["pass"];
//    $pass_register = password_hash($pass_register, PASSWORD_DEFAULT);


    try {
//        try connect
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//        check if user is already in
        //todo make table as variable
        $sql = "SELECT * FROM MyGuests WHERE name='" . $user_register . "';";
//        $sql = "SELECT * FROM MyGuests WHERE name='" . $user_register . "' AND pass='" . $pass_register . "';";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        //sql to insert new user to the table
        $table_name = "MyGuests";


        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $output_database = $stmt->fetch();

//        print output from database
        /*        $counter = 0;
                echo "<br>";
                echo "----------<br>";
                echo implode(" ",$output_database[0]) . "<br>";
                echo "----------<br>";
                foreach(new RecursiveArrayIterator($output_database) as $k=>$v) {
                    echo "(#" .$counter . "#)";
                    echo implode(" ",$v) . "<br>";
                    $counter++;
                }*/
//todo dat do kundy vypisy
        if ($output_database != NULL){
            if (count($output_database) != 0) {
                echo "----------<br>";
                echo gettype($output_database['pass']);
                echo $output_database['pass'] . '<br>';
                echo "----------<br>";
                echo gettype($pass_register);
                echo $pass_register;

                echo "----------<br>";


                if (password_verify($pass_register, $output_database['pass'])) {
                    //                todo dat do kundy vypisy
                    echo "Welcome";
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION[“logged_in”] = true;
                } else
                    echo "not Welcome";

            } else {
                echo 'user is not in database<br>';

            }
        }

    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }


    echo "\nend";

    $conn = null;
}


?>
