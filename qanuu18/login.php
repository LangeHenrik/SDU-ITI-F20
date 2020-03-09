<?php
session_start();

require_once 'extfiles/config.php';
try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));

    if (isset($_POST['login']))
    {
        if (empty($_POST["username"]) || empty($_POST["password"]))
        {
            echo "Please fill all fields";
        }
        else
        {
            $usernameinput = filter_input(INPUT_POST,"username", FILTER_SANITIZE_STRING);
            $passwordinput = filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING);

            $query = "SELECT * FROM userinfo WHERE user = :username";
            $stmt = $conn->prepare($query);
            $stmt->execute(array(
                'username' => $usernameinput
            ));
            $count = $stmt->rowCount();

            if ($count > 0)
            {
                
                while($result =  $stmt->fetch(PDO::FETCH_ASSOC)){

                
               
                    if(password_verify ($passwordinput ,$result["password"])){

                        $_SESSION["username"] = $usernameinput;
                    break;
                    }

                    
                }
            
                header("location:imagefeed.php");
            }
            else
            {
                echo "Wrong username or password";
            }
        }
    }
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
