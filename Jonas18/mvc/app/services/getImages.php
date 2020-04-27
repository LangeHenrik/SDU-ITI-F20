<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/jonas18/mvc/app/core/Database.php';
require '..\models\Image.php';
$model = new Image();
$results = $model->getAllImages();

foreach ($results as $picture){
    echo '<div class="person">';
    echo '<p class="title">' . $picture['user_id'] ."-" . $picture['title'] . '</p>';
    echo '<p class="description">' . $picture['description']  . "</p>";
    echo '<img src="' . $picture['image'] . '"  alt="error"/>';  
    echo '<br/>';
    echo '</div>';
}
?>