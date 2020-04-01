<?php if (isset($_SESSION['uploadSuccess']) && $_SESSION['uploadSuccess']) : ?>
    <?= '<h4> Picture uploaded succesfully</h4>';?>
<?php elseif (isset($_SESSION['uploadFail']) && $_SESSION['uploadFail']) : ?>
    <?= '<h4> Error while uploading picture, picture must be either jpg, jpeg, png or gif format</h4>'; ?>
<?php else : ?>
    <?= '<h4> Upload an image please </h4>'; ?>

<?php endif; ?>