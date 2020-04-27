<?php
include '../app/views/partials/menu.php';
?>
    <style>
        <?php include '../../css/style.css'; ?>
    </style>
<?php
    include '../app/views/partials/pagegrid.php';
    include '../app/views/partials/sidebar.php';

?>

<!--<div class="homepage2" name="Image_page" id="imagePage">
    <div class="image-container">
        <?php/*
        $grab = $conn->query("SELECT header, description, user, picture FROM pictures ORDER BY pic_id DESC");
        foreach ($grab as $pictures){
            print '<div class="container1">';
            print $pictures['user'].'</br><h2>'. $pictures['header'] .'</h2></br>';
            print '<img class="images"  src="data:image/jpeg;base64,' . base64_encode( $pictures['picture'] ) . '" />';
            print '</br>'.$pictures['description'].'</br>';
            print '</div>';
        }*/
        ?>
    </div>
</div>->>
<?php //Hello there, <?=$viewbag['username']?>

<?php include '../app/views/partials/foot.php'; ?>

