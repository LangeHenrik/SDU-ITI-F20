<?php

foreach ($viewbag as &$value) {
    foreach ($value as &$nvalue) {
        echo $nvalue;
    }
}



