<?php
$title = "List of users";
include_once '../app/views/partials/Navbar.php';

print "<div class='center'> ";
foreach ($viewbag['users'] as $user){
    print "<div class='user'>";
    if ($user['avatar'] == null){
        print '<img class="avatar" src="/akvis18/mvc/public/Images/default-user.png">';
    } else {
        print '<img class="avatar" src="data:image/jpeg;base64,' .  $user['avatar']  . '" />  ';
    }
    print $user['username'];
    print '<p>' . ' User since: ' . $user['created_on'] . '</p><hr/>';
    print "</div>";
}
print "</div>";
