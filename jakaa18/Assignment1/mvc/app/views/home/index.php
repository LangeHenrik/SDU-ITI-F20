<?php
$path = "../partials/menu.php";
echo "Path : $path";
include $path;?>

Hello there, <?=$viewbag['username']?>

<?php include '../partials/foot.php'; ?>