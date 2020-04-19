<?php include '../app/views/partials/menu.php'; ?>
<div class="container">
    <label class="label"> Click here to go back to User Menu</label>
</div>
<div class="container">
<!--    <a href="userMenuView">-->
    <a href="/frtol07/mvc/public/home/userMenuView">
        <button class="bigBtn">Go to User menu</button>
    </a>
</div>

<div class="container">
    <table class="label">
        <th>Username</th>
        <th>Email</th>
        <?php
        foreach ($viewbag as $value) {
            echo '<tr>';
            echo '<tr>';
            echo '<td>' . $value['username'] . '</td>';
            echo '<td>' . $value['email'] . '</td>';
            echo '</tr>';
            echo '<tr>';
        }
        ?>
    </table>
</div>

<?php include '../app/views/partials/foot.php'; ?>
