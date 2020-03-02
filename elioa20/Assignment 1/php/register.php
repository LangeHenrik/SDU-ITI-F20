<?php
session_start();


require_once 'db_config.php';

try {


        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $password2 = htmlspecialchars($_POST['password2']);

        $ok = true;
        $messages = array();

        if($username==null || $password==null || $password2==null){
            $ok = false;
            $messages[] = "You must fill in all the fields";
        }

        if($password!==$password2){
            $ok = false;
            $messages[] = "Passwords don't match";
        }


        /*
        //TODO: Check regexes
        if(preg_match('/^(?=.*[a-z])[a-z0-9]{1,45}$/',$username)===false){
            $ok = false;
            $messages[] = 'Invalid username. Username must be between 1-45 characters, only lower-case characters and must contain at least 1 digit';
        }

        if(preg_match('/^(?=.{8,45}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).*$/',$password)===false){
            $ok = false;
            $messages[] = 'Invalid password. Password must be between 8-45 characters, have at least 1 lower-case character, have at least 1 upper-case character and have at least 1 digit';
        }
        */


        if($ok) {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);


            $sql = 'CALL UserExists(:username,@bool)';

            // prepare for execution of the stored procedure
            $stmt = $pdo->prepare($sql);

            // pass value to the command
            $stmt->bindParam(':username', $username, PDO::PARAM_STR, 45);


            // execute the stored procedure
            $stmt->execute();

            $stmt->closeCursor();

            $row = $pdo->query("SELECT @bool AS return_message")->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                if ($row !== false) {
                    //User exists
                    if($row["return_message"]){
                       $ok = false;
                       $messages[] = "A user with such username exists. Select a new username or login.";
                    }
                    else
                        //Insert user
                        {

                            $sql = 'CALL InsertNewUser(:username,:password)';

                            // prepare for execution of the stored procedure
                            $stmt = $pdo->prepare($sql);

                            $pwdHashed = password_hash($password,PASSWORD_DEFAULT);
                            echo("Raw Password {$password}" . PHP_EOL);
                            echo("Hashed Password {$pwdHashed}" . PHP_EOL);


                            // pass value to the command
                            $stmt->bindParam(':username', $username, PDO::PARAM_STR, 45);
                            $stmt->bindParam(':password', $pwdHashed, PDO::PARAM_STR, 45);

                            // execute the stored procedure
                            $stmt->execute();

                            $stmt->closeCursor();
                        $ok = true;
                        $messages[] = 'Successfully Registered';

                    }
                }
            }
        }
    }catch
    (PDOException $e) {
        die("Error occurred:" . $e->getMessage());
    }

    echo json_encode(
    array(
        'ok' => $ok,
        'messages' => $messages
    )
);




?>