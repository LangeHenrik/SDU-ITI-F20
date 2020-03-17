<?php
session_start();

if($_GET['upload']=='true'){
    session_destroy();
}

if(isset($_SESSION['logged_in'])) {
    echo json_encode(
        array(
            'ok' => true,
        )
    );
}
else{
    echo json_encode(
        array(
            'ok' => false,
        )
    );
}

?>