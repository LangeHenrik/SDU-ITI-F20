<?php
$title = "Login page";
include '../app/views/partials/menu.php';

?>
    <style>
        <?php include '../../css/style.css'; ?>
    </style>


    <div class="grid-container2">
<div class="header">
    <h1><?php echo 'Welcome to your homepage!' ?></h1>
</div>

    <?php include '../app/views/partials/sidebar.php'?>

<div class="homepage2" name="Image_page" id="imagePage">
    <div class="image-container">
        <?php
        foreach ($viewbag['posts'] as $post){
            print '<div class="post container">';

            print $post['user'].'</br><h2>'. $post['header'] .'</h2></br>';
            print '<img class="main-image" src="data:image/jpeg;base64,' . str_replace('data:image/jpeg;base64,','', $post['picture'] ) . '" />';
            print '</br>'.$post['description'].'</br>';

            print '</div>';

        }
        ?>
    </div>
</div>

<?php include '../app/views/partials/foot.php'; ?>