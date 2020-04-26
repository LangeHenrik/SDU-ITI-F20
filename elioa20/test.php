<?php

    $seagulls = new PDO("mysql:host=localhost;dbname=odinsblog",
    "root",
    "rootelioa20",
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    print_r($seagulls);