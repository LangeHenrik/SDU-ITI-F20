<?php
include_once "Shared/CheckIfLoggedIn.php";
$title = "List of users";
include_once 'Shared/Navbar.php';
include_once "Shared/DBConnect.php";
$r = query( "SELECT avatar, username, created_on FROM user;", []);
print "<div class='center'> ";
foreach ($r as $user){
    print "<div class='user'>";
    if ($user['avatar'] == null){
        print '<img class="avatar" src="Images/default-user.png">';
    } else {
        print '<img class="avatar" src="data:image/jpeg;base64,' . base64_encode( $user['avatar'] ) . '" />  ';
    }
    print $user['username'];
    print '<p>' . ' User since: ' . $user['created_on'] . '</p><hr/>';
    print "</div>";
}
print "</div>";
