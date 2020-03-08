<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
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
    <h1>Registration</h1>
</div>

<div id="form" class="registration_form">
    <form onsubmit="return checkform();" action="registration.php" method="post">
        <label for="name">name:</label>
        <input type="text" id="name" name="name"><br>
        <p class="info" id="nameinfo"></p><br><br>
        <label for="pass">password:</label>
        <input type="password" id="pass" name="pass"><br>
        <p class="info" id="passinfo"></p><br><br>
        <input type="submit" value="registration">
    </form>
    <script src="registration_form.js"></script>
</div>

<?php
if (!empty($_POST) && $_POST["name"] != NULL && valid_human_name($_POST["name"]) && valid_password($_POST["pass"])) {
    $user_register = $_POST["name"];
    $pass_register = $_POST["pass"];


    try {
//        try connect
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//        check if user is already in
        $sql = "SELECT name FROM MyGuests WHERE name='" . $user_register . "';";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        //sql to insert new user to the table
        $table_name = "MyGuests";

        $sql = "INSERT INTO " . $table_name . " (name, pass)
VALUES ('" . $user_register . "', '" . $pass_register . "');";
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $output_database = $stmt->fetchAll();

//        print output from database
/*        foreach(new RecursiveArrayIterator($output_database) as $k=>$v) {
            echo implode(" ",$v);

        }*/

        if (count($output_database) != 0) {
            echo 'user is already in database';
            foreach(new RecursiveArrayIterator($output_database) as $k=>$v) {
                echo implode(" ",$v);
            }
        } else {
            $pass_register = password_hash($pass_register, PASSWORD_DEFAULT);
            $sql = "INSERT INTO " . $table_name . " (name, pass)
VALUES ('" . $user_register . "', '" . $pass_register . "');";


            //show sql in console
            echo $sql . "\n";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Table MyGuests created successfully";
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














