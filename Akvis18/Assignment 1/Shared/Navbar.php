<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device width, initial scale=1.0">
    <link rel="stylesheet" type="text/css" href="Shared/Style.css">
    <!--<Link rel="icon">//Todo Add icon-->
    <title>
        <?php
        if (isset($title)) {
            echo $title . " | FaceWall";
        } else {
            echo "FaceWall";
        } ?>
    </title>
</head>
<body>
