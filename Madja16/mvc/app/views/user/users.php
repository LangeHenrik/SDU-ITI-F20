<?php include '../app/views/partials/menu.php'; ?>

<div class="container" style="width: 27rem;">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Username</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (!empty($viewbag)) {
                for ($i=0; $i < count($viewbag); $i++) { ?>

                <tr>
                    <td> <?= $viewbag[$i]['user_id'] ?> </td>
                    <td> <?= $viewbag[$i]['username'] ?> </td>
                </tr>

                <?php   
                }
            }
            ?>

        </tbody>
    </table>
</div>


<?php include '../app/views/partials/foot.php'; ?>