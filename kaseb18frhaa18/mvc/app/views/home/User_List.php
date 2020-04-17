<?php include_once '../partials/header.php'; ?>

<div class="wrapper">
    <div class="contentlist">
        <form>
            Find user: <input type="text" onkeyup="findUsers(this.value)">
        </form>
        <div>
            <table class="userlist" id="users"></table>
        </div>
    </div>
</div>