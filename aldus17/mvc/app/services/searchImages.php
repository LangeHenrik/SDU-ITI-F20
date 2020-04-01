<?php
require_once '..\models\Image.php';
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
$searchParameter = filter_input(INPUT_GET, 'searchParameter', FILTER_SANITIZE_STRING);

$model = new Image();
$imageResults = $model->getAllImages();

$imageData = array();


if ($searchParameter !== "" || !empty($searchParameter)) {
    $searchParameter = strtolower($searchParameter);
    $searchParameterLength = strlen($searchParameter);
    foreach ($imageResults as $image) {
        if (stristr($searchParameter, substr($image['username'], 0, $searchParameterLength))) {
            array_push($imageData, $image);
        }
    }
} else {
    // get all image data if search did not find anything
    $imageData = $imageResults;
}

foreach ($imageData as $img) {

    echo '<div class="imagePost">';
    echo "<h1>" . $img['title'] . "</h1>";
    echo "<p>" . $img['description'] . "</p>";
    echo '<img src="' . $img['image'] . '"' . 'alt=alternative_image.png' . '"/>';
    echo "<p><i>" . "Posted by: " . $img['username'] . str_repeat('&nbsp;', 2) . " created on: " . $img['creationTime'] . "</i></p>";
    echo '</div>';
    echo "<hr>";
}
