<?php
if (isset($_POST['create'])){
    $username = filter_input(INPUT_POST, 'username') ;
    $password=filter_input(INPUT_POST, 'password');
    $db_user='root';
    $db_pass='C/|gkRgkYbJ8';
    $db_name='gallery';
    $db_host='127.0.0.1:3306';
    $db = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        } 
    $createUser = $db->query("INSERT into users (username, password) VALUES ('$username', '$password')");
    if($createUser){
            echo "Registration is complete";
            echo   "<script>
                        alert('message sent succesfully'); 
                        window.history.go(-1);
                    </script>";
        }else{
            echo "Registration failed, please try again.";
            echo   "<script>
                        alert('Registration failed'); 
                        window.history.go(-1);
                    </script>";
        } 
} 

