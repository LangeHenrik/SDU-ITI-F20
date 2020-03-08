<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Frontpage</title>
    <meta name="viewport" content="width=device width, initial scale=1.0">
<!--    main css-->
    <link rel="stylesheet" type="text/css" href="style.css">
<!--    awesome font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
error_reporting(E_ALL);
require_once 'sanitize_input.php';
require_once 'db_config.php';
?>

<div class="header">
    <h1>Login</h1>
</div>

<div id="form" class="login_form">
    <a href="registration.php">Registration</a>
<!--    todo change action-->
    <form onsubmit="return checkform();" action="main.php" method="post">
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
if (!empty($_POST) && $_POST["name"] !== NULL && valid_human_name($_POST["name"]) && valid_password($_POST["pass"])) {
    $user_register = $_POST["name"];
    $pass_register = $_POST["pass"];
    $pass_register = password_hash($pass_register, PASSWORD_DEFAULT);


    try {
//        try connect
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
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
        while($r = mysqli_fetch_assoc($stmt)) {
            $rows[] = $r;
        }
        $output_database = $stmt->fetchAll();

//        print output from database
        $counter = 0;
        echo "<br>";
        echo "----------<br>";
        echo implode(" ",$output_database[0]) . "<br>";
        echo "----------<br>";
        foreach(new RecursiveArrayIterator($output_database) as $k=>$v) {
            echo "(#" .$counter . "#)";
            echo implode(" ",$v) . "<br>";
            $counter++;
        }

        if (count($output_database) !== 0) {
            echo 'user is already in database<br>';
            require_once('Users.php');
            foreach(new Users(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                echo $v;
            }


        } else {
            echo 'user is not in database<br>';

        }

    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }


    echo "\nend";

    $conn = null;
}


?>

<div class="footer">
    <p>@Josef Sanda</p>
</div>
</body>
</html>