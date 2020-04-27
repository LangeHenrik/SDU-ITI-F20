<?php
require_once 'core/init.php';

$user = new User();
if($user->isLoggedIn()){
    echo '<p><a class="sign" href="index.php">Return to main menu</a>';
$viewImage = DB::getInstance()->query("SELECT * FROM images");  
foreach($viewImage->results() as $viewImage) {
    echo '<head>
            <link rel="stylesheet" href="style.css">
        </head>';
    echo "<form><table><div id='img_div'>";
        echo "<td><p>".$viewImage->title."</p>";
        echo "<img src='images/".$viewImage->image."' >";
        echo "<p>".$viewImage->description."</p>";
        echo "<p>Uploaded by: ".$viewImage->uploadby."</p></td>";
    echo "</div></table></form>";
}
} else {
    Redirect::to('index.php');
}