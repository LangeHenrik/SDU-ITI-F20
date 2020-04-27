<div class="homepage2" id="userfeed">
    <div class="userfeed">
<?php
foreach ($viewbag['users'] as $user){
    print_r($user['username']);
    ?><br><?php
}
?>
    </div>
</div>
