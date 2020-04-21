<?php
include_once '../app/views/partials/header.php';

    for ($i=0; $i < count($viewbag); $i++) { ?> 
        <img src="<?=$viewbag[$i][3]?>" alt="<?=$viewbag[$i][1]?>" height="200px" width="300px"> </br>
    <?php }

include_once '../app/views/partials/foot.php';