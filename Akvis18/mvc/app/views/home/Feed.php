<?php
$title = "Feed";
require_once '../app/views/partials/Navbar.php';

foreach ($viewbag['posts'] as $post){
    print '<div class="post container">';
    if ($post['avatar'] == null){
        print '<img class="avatar" src="/akvis18/mvc/public/Images/default-user.png">';
    } else {
        print '<img class="avatar" src="data:image/jpeg;base64,' . $post['avatar'] . '" />  ';
    }
    print $post['username'].'</br><h2>'. $post['title'] .'</h2></br>';
    print '<img class="main-image" src="data:image/jpeg;base64,' . str_replace('data:image/jpeg;base64,','', $post['image'] ) . '" />';
    print '</br>'.$post['description'].'</br>';

    print '</div>';

}