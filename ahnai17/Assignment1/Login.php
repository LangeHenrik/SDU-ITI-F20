<?php  
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

require_once 'db_config.php';   
$username = filter_input(INPUT_POST, 'username');
$password=filter_input(INPUT_POST, 'password');
//echo $username;

try {
        /* @var $conn PDO */
    $conn= ConnectToDB();
    $sql = "SELECT username, password FROM users WHERE username = :username";
    $loggin = $conn->prepare($sql);
    $loggin->bindParam(':username', $username);
    $loggin->execute();
    $loggin->setFetchMode(PDO::FETCH_ASSOC);
    $result = $loggin->fetchAll();
    $output = 'login error';
    print_r($result);
    echo '<br> her <br>';
    print_r($result[0]);
    echo '<br>';
if (!empty($result))
{
    if ( password_verify($password,  $result[0]['password']))
    {
        echo "Loggin in...";
        // Account found
 
        $output = 'logged in';
         header("Location:Home.html");
            exit;
    }else {
           
            $output = 'not activated';
            $_SESSION['username'] = $username;
    }     
}
    echo $output;
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }
