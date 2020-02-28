<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styling.css">
    <title>Registration</title>
</head>
<body>

        <div class="content" id="registration">
        <script src="./javascript/Menu.js"></script>
            <h1>Registration</h1>
                <form onKeyUp="return checkFields()" method="POST" action=>
                    <fieldset>            
                        <legend>Registration for system:</legend>   
                        <label for = "username">Username: </label>
                        <p id="usernameStatus"> </p>
                        <br>
                        <input type="text" name="username" id="username" placeholder="Write username here" autofocus required>
                        <br>
                        <label for = "password">Password: </label>
                        <br>
                        <p id="passwordStatus"> </p>
                        <input type="password" name="password" id="password" placeholder="Write password here" required >
                        <br>
                        <label for = "password2">Retype password: </label>
                        <br>
                        <p id="password2Status"> </p>
                        <input type="password" name="password2" id="password2" placeholder="Write password again" required >
                        <br>
                        <input type="Submit" name="submit" value="Register" id="submit">
                        
                        
                    </fieldset> 
                </form>
            <p>If you are having trouble registering, please contact support.</p>
            <br>
        </div>
    <script src="regExRegistration.js"></script>
    <?php
    //      TODO - We have to check that the regex is fulfilled before we commit to the database,
    //      this code will just insert it without checking
    //     require_once 'db_config.php';
    //     try {
    //     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
    //     $password,
    //     array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    //     $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES(:username, :password)");
    //     $stmt->bindParam(':username', $_POST[username]);
    //     $stmt->bindParam(':password', $_POST[password]);

    //     $stmt->execute(); 
    //     $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    //     $result = $stmt->fetchAll();
    //     echo $result;

    //     } 
    //     catch (PDOException $e) {
    //     echo "Error: " . $e->getMessage();
    //     }
    // $conn = null;
    ?>
    </body>
</html>