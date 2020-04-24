<?php
include '../app/views/partials/menu.php';
?>
    <style>
        <?php include '../../css/style.css'; ?>
    </style>
<?php
include '../app/views/partials/pagegrid.php';
include '../app/views/partials/sidebar.php';
include '../app/views/partials/uploadpage.php';
?>
    Hello there, <?=$viewbag['username']?>

<?php include '../app/views/partials/foot.php'; ?>