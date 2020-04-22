<?php
$path = "../app/views/partials/sidebar.php";
echo "Path : $path";
include $path;?>

Hello there, <?=$viewbag['username']?>

<?php include '../app/views/partials/foot.php'; ?>