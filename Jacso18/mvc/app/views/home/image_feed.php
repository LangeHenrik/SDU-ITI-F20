<?php
include '../app/views/partials/menu.php'; ?> 

    <div class="wrapper">
        <div class=search>
            <input type="text" id="search" name="search" placeholder="Search post by user" onload="showPosts(this.value)" onkeyup="showPosts(this.value);" />
        </div>
        <div class="content" id="content">
        </div>
    </div>

<?php
include '../app/views/partials/foot.php'; ?> 