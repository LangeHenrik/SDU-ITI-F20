<form method="post">
            
    <legend>Fill in the form to log in:</legend>   
    <label for="name">Name:</label>
    <input type="text" id="name" name="name"/>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"/>
    <br>
    <input type="submit" value="submit button"/>
</form>

<?php
$message = "You are not logged in!";
echo $message;

$loggedIn = False;
if($_POST["name"] == "Mathias") {
    $message = "Welcome Mathias!";
    echo $message;
    $loggedIn = True;
    

} else {
    $message = "Wrong user!";
    echo $message;
    $loggedIn = False;
    echo $loggedIn;
}
?>

