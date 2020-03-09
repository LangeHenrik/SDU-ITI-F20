<?php
session_start();
require 'config.php';

//Retrieve the values of username and password from our login form.
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$ok = true;
$messages = array();

if (!isset($username) || empty($username)) {
    $ok = false;
    $messages[] = 'Username cannot be empty!';
}

if (!isset($password) || empty($password)) {
    $ok = false;
    $messages[] = 'Password cannot be empty!';
}

if ($ok) {
    //Create an sql statement to retrieve the user account information based on the username.
    $sql = "SELECT id, password FROM users WHERE username = :username";
    $stmt = $db->prepare($sql);

    //Bind the username value.
    $stmt->bindValue(':username', $username);

    //Execute query.
    $stmt->execute();

    //Fetch row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //Check if row count is above 0, by doing so, we know whether a user with that username exists.
    if ($stmt->rowCount() > 0) {

        //Check if password is correct by unhashing and verifying it.
        if(password_verify($password, $row['password'])){

            //Successfully log user in and provide information to session.
            $_SESSION["logged_in"] = true;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $username;

            $ok = true;
            $messages[] = 'Successful login!';
        } else {
            $ok = false;
            $messages[] = 'Incorrect username/password combination!';
        }
    } else {
        $ok = false;
        $messages[] = 'No such username in the system!';
    }
}

//create a JSON object from an array that has "ok" and all the "messages" set inside.
echo json_encode(
    array(
        'ok' => $ok,
        'messages' => $messages
    )
);
