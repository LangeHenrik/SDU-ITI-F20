<?php
include_once 'Shared/CheckIfLoggedIn.php';
$title = "Feed";
include_once 'Shared/Navbar.php';
include_once 'Shared/DBConnect.php';
$r = query('SELECT username, avatar, title, description, image, post.created_on 
                   FROM user INNER JOIN post ON user.user_id = post.user_id 
                   ORDER BY post.created_on DESC;',[]);

foreach ($r as $post){
    print '<div class="post container">';
    if ($post['avatar'] == null){
        print '<img class="avatar" src="Images/default-user.png">';
    } else {
        print '<img class="avatar" src="data:image/jpeg;base64,' . base64_encode( $post['avatar'] ) . '" />  ';
    }
    print $post['username'].'</br><h2>'. $post['title'] .'</h2></br>';
    print '<img class="main-image" src="data:image/jpeg;base64,' . base64_encode( $post['image'] ) . '" />';
    print '</br>'.$post['description'].'</br>';

    print '</div>';

}