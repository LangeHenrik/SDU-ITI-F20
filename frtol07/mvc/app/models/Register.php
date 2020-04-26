<?php


class Register extends Database
{
    public function registerUser()
    {
        //GetUsers registration
        if (isset($_POST['submitUser'])) {
//            $registrationUsername = $_POST['registrationUsername'];
            $registrationUsername = htmlspecialchars($_POST['registrationUsername']);
//            $registrationPassword = $_POST['registrationPassword'];
            $registrationPassword = htmlspecialchars($_POST['registrationPassword']);
            $registrationPasswordHash = password_hash($registrationPassword, PASSWORD_DEFAULT);
//            $registrationEmail = $_POST['registrationEmail'];
            $registrationEmail = htmlspecialchars($_POST['registrationEmail']);

            if (Register::check_registrationUsername($registrationUsername) &&
                Register::check_registrationPassword($registrationPassword) &&
                Register::check_registrationEmail($registrationEmail)) {

                try {
                    $stmt = "INSERT INTO `users`(`username`, `password`, `email`)
VALUES(:username,:password,:email)";

                    $query = $this->conn->prepare($stmt);
                    $query->bindParam(':username', $registrationUsername, PDO::PARAM_STR);
                    $query->bindParam(':password', $registrationPasswordHash, PDO::PARAM_STR);
                    $query->bindParam(':email', $registrationEmail, PDO::PARAM_STR);
                    $query->execute();

                    echo "You are registered";
                    return true;

                } catch (PDOException $e) {
                    $existingkey = "Integrity constraint violation: 1062 Duplicate entry";
                    if (strpos($e->getMessage(), $existingkey) !== FALSE) {

                        // Take some action if there is a key constraint violation, i.e. duplicate name
                        Register::console_log("Brugernavn findes allerede!! -> Din idiot");
                        echo "User name already exists";
                    } else {
                        throw $e;
                    }
                }
//                echo "You are registered";
//                return true;
            }else{
                echo "Error in typed data";
                return false;
            }

        } else {
            echo "No post method is sent from form";
            return false;
        }


    }

    //    (?=.{8,})

//Check if registration username is good to go
    function check_registrationUsername($registrationUsername)
    {
        if (!preg_match("/[a-z|A-Z|æøå|ÆØÅ]{1,20}$/", $registrationUsername)) {
            Register::console_log("(PHP) Wrong username typed");
            return false;
        }
        Register::console_log("(PHP) Username ok");
        return true;
    }


//Check if registration password is good to go
    function check_registrationPassword($registrationPassword)
    {
        if (!preg_match("/[^-\s]{2,20}$/", $registrationPassword)) {
            Register::console_log("(PHP) Wrong password typed");
            return false;
        }
        Register::console_log("(PHP) Password ok");
        return true;
    }

//Check if registration email is good to go

    function check_registrationEmail($registrationEmail)
    {
        if (!preg_match("/^\S+@\S+\.[a-z|A-Z]{2,10}$/", $registrationEmail)) {
            Register::console_log("(PHP) Wrong email typed");
            return false;
        }
        Register::console_log("(PHP)  Email ok");
        return true;
    }

////Write to console.log
    function console_log($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
            ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }
}

?>

