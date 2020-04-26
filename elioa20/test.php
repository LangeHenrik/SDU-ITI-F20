<?php

    $seagulls = new PDO("mysql:host=localhost;dbname=odinsblog",
    "root",
    "1234",
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    print_r($seagulls);