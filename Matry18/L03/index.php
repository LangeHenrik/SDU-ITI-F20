
<form method="post">
            
    <legend>Fill in the form to log in:</legend>   
    <label for="name">Name</label>
    <input type="text" id="name" name="name"/>
    <br>
    <label for="password">Password</label>
    <input type="text" id="password" name="password"/>
    <br>
    <input type="submit" value="submit button"/>
</form>

<?php
$loggedIn = False;
if($_POST["name"] == "Mathias") {
    echo 'Hej Mathias';
    $loggedIn = True;
} else {
    echo 'Wrong user';
    $loggedIn = False;
}
?>

