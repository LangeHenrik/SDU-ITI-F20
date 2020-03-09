<?php
    session_start();
    include 'db_config.php';

    try{
        
        $db = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
        echo "Connection error: " . $e->getMessage();
    }

    if ( !isset($_POST['username'], $_POST['password'])){
        die('Please fill out both the username and password!');
    }

    if ($stmt = $conn->prepare('SELECT id, password FROM users WHERE username = ?')){

        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();

            if($_POST['password'] === $password) {
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                echo 'Welcome ' . $_SESSION['name'] . '!';

            } else {
                echo 'Incorrect password!';
            }
        } else {
            echo 'Incorrect username';
        }
        
        $stmt->close();
    }
?>