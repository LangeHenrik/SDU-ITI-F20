<head>

    <link rel="stylesheet" href="../css/imagefeed_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <html lang="en">
</head>
<?php
?>

<?php foreach ($viewbag['images'] as $img) { ?>

    <div class="imagePost">
        <h1><?= $img['title'] ?></h1>
        <p><?= $img['description'] ?></p>
        <img src=" <?= $img['image'] ?> " />';
        <p><i><?= $img['username'] . str_repeat('&nbsp;', 2) . " created on: " . $img['creationTime'] ?></i></p>
    </div>
    <hr>

<?php } ?>