<?php
include_once '../app/views/partials/header.php';?>

<div id="floated-imgs">
<?php
    for ($i=0; $i < count($viewbag); $i++) { ?> 
<img src="<?=$viewbag[$i][3]?>" title="<?=$viewbag[$i][1]?>"
     alt="<?=$viewbag[$i][1]?>" height="100px" width="150px">
<p>Title: <?=$viewbag[$i][1]?> </p>
<p>Description: <?=$viewbag[$i][2]?></p>
    <?php }
?></div> <?php
include_once '../app/views/partials/foot.php';