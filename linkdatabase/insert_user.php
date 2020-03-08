<script>console.log("INSERTING USER");</script>
<?php
    if(array_key_exists('signup-submit', $_POST)){
        try{
            $connection = new PDO("mysql:host=$server;dbname=$database", 
            $username_database, $password_database, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $stmt = $connection->prepare("INSERT INTO users (username, email, pwd) VALUES(:username, :email, :pwd)");
            
            $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            #$user = "user";
            $userXSS = htmlspecialchars($user, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');
            $stmt->bindParam(':username', $userXSS, PDO::PARAM_STR);

            $email = filter_var($_POST['email-register'], FILTER_SANITIZE_STRING);
            #$email = "asds@asds.com";
            $emailXSS = htmlspecialchars($email, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');
            $stmt->bindParam(':email', $emailXSS, PDO::PARAM_STR);

            $pass = filter_var(password_hash($_POST['pwd-register'], PASSWORD_DEFAULT), FILTER_SANITIZE_STRING);
            #$pass = "senha123";
            $passXSS = htmlspecialchars($pass, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');
            $stmt->bindParam(':pwd', $passXSS, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

        } catch (PDOException $e){
            echo $e->getMessage();
        }
        $connection = null;
    }
?>
