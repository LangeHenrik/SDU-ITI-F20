<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <title>Functions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

</body>

</html>


<?php
require_once 'db_config.php';
include 'connect.php';


$loginUsername = "";
$loginPassword = "";
$registrationUsername = "";
$registrationPassword = "";
$registrationEmail = "";

    //User registration
    if (isset($_POST['submitUser'])) {
        $registrationUsername = $_POST['registrationUsername'];
        $registrationPassword = $_POST['registrationPassword'];
        $registrationPasswordHash = password_hash($registrationPassword,PASSWORD_DEFAULT);



        $registrationEmail = $_POST['registrationEmail'];
        if (check_registrationUsername($registrationUsername) &&
            check_registrationPassword($registrationPassword) &&
            check_registrationEmail($registrationEmail)) {


            try {
                $stmt = "INSERT INTO `users`(`username`, `password`, `email`)
VALUES(:username,:password,:email)";

                $query = $pdo->prepare($stmt);
                $query->bindParam(':username', $registrationUsername, PDO::PARAM_STR);
                $query->bindParam(':password', $registrationPasswordHash, PDO::PARAM_STR);
                $query->bindParam(':email', $registrationEmail, PDO::PARAM_STR);

                $query->execute();

            } catch (PDOException $e) {
                $existingkey = "Integrity constraint violation: 1062 Duplicate entry";
                if (strpos($e->getMessage(), $existingkey) !== FALSE) {

                    // Take some action if there is a key constraint violation, i.e. duplicate name
                    console_log("Brugernavn findes allerede!! -> Din idiot");
                    echo "<br>";
                    echo "User name already exists";
                    echo "<br>";
                } else {
                    throw $e;
                }
            }
        }

    }

//    (?=.{8,})

//Check if registration username is good to go
function check_registrationUsername($registrationUsername)
{
//TODO Mangler Æ,Ø,Å,æ,ø,å i regex....
//    if (!preg_match("/^[^-\s]{1,100}$/", $registrationUsername)) {
        if (!preg_match("/[a-z|A-Z|æøå|ÆØÅ]{1,20}$/", $registrationUsername)) {
        echo '<script type="text/javascript">openRegistrationUsernameModal(); </script>';
        console_log("Wrong username typed");
        return false;
    }
    console_log("Username ok");
    return true;
}




//Check if registration password is good to go
function check_registrationPassword($registrationPassword)
{
//    if (!preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $registrationPassword)) {
    if (!preg_match("/[^-\s]{2,20}$$/", $registrationPassword)) {
        echo '<script type="text/javascript">openRegistrationPasswordModal(); </script>';
        console_log("Wrong password typed");
        return false;
    }
    console_log("Password ok");
    return true;
}

//Check if registration email is good to go

function check_registrationEmail($registrationEmail)
{
    if (!preg_match("/\S+@\S+\.([a-z]|[A-Z]){2,10}/", $registrationEmail)) {
        echo '<script type="text/javascript">openRegistrationEmailModal(); </script>';
        console_log("Wrong email typed");
        return false;
    }
    console_log("Email ok");
    return true;
}



//Write to console.log
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

?>



