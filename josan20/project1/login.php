<?php
print_r($_SESSION);
error_reporting(E_ALL);
require_once 'sanitize_input.php';
require_once 'db_config.php';
?>

<div class="header">
    <h1>Login</h1>
</div>

<!--<form method="post">-->
<!--    <input type="submit" name="button_logout"-->
<!--           class="button_logout" value="Logout"/>-->
<!--</form>-->

<?php
/*if (session_status() !== PHP_SESSION_NONE && isset($_POST['button_logout']) && $_SESSION[“logged_in”] == true) {
    echo "This is Button1 that is selected";
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
}*/

?>

<div id="form" class="login_form">
    <a href="registration_page.php">Registration</a>
    <!--    todo change action-->
    <form onsubmit="return checkform();" action="#" method="post">
        <label for="name">name:</label>
        <input type="text" id="name" name="name"><br>
        <p class="info" id="nameinfo"></p><br><br>
        <label for="pwd">pwdword:</label>
        <input type="pwdword" id="pwd" name="pwd"><br>
        <input type="submit" value="login"><br>
        <p class="info" id="pwdinfo"></p><br>
    </form>
    <script src="registration_form.js"></script>
</div>

<?php
if (!empty($_POST) && isset($_POST['login']) && isset($_POST["name"]) && valid_human_name($_POST["name"]) && valid_pwdword($_POST["pwd"])) {
    $user_register = $_POST["name"];
    $pwd_register = $_POST["pwd"];
//    $pwd_register = pwdword_hash($pwd_register, pwdWORD_DEFAULT);


    try {
//        try connect
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpwdword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//        check if user is already in
        //todo make table as variable
        $sql = "SELECT * FROM MyGuests WHERE name='" . $user_register . "';";
//        $sql = "SELECT * FROM MyGuests WHERE name='" . $user_register . "' AND pwd='" . $pwd_register . "';";

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
        if ($output_database != NULL) {
            if (count($output_database) != 0) {
//                echo "----------<br>";
//                echo gettype($output_database['pwd']);
//                echo $output_database['pwd'] . '<br>';
//                echo "----------<br>";
//                echo gettype($pwd_register);
//                echo $pwd_register;
//
//                echo "----------<br>";


                if (pwdword_verify($pwd_register, $output_database['pwd']) && session_status() == PHP_SESSION_NONE) {
                    //                todo dat do kundy vypisy
                    echo "Welcome";

                    $_SESSION["logged_in"] = TRUE;
                    print_r($_SESSION);
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

print_r($_SESSION);
?>
