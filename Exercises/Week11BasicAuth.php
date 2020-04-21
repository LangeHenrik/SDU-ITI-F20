<?php

    $headers = apache_request_headers();
    
    foreach ($headers as $header => $value) {
        echo "$header: $value <br/>\n";
    }
    
    ?>
    
    <br/><br/><hr/>
    
    Server array: <br/>
    
    <pre>
        <?php print_r($_SERVER, true); ?>
    </pre>

    <br/><br/><hr/>
    
    <?=$_SERVER['PHP_AUTH_USER'] ?? '!!'?>
    <br/>
    <?=$_SERVER['PHP_AUTH_PW'] ?? '??'?>
        
    
    <?php
    
    $GLOBALS['username'] = 'myusername';
    $GLOBALS['password'] = 'mypassword';
    $GLOBALS['apikey'] = 'mykey';

    function checkPassword() {
        if ($_SERVER['PHP_AUTH_PW'] == $GLOBALS['password']) {
            echo 'password OK <br/>';
            return true;
        }
        return false;
        
    }
    
    function checkApikey () {
        if ($_GET['apikey'] == $GLOBALS['apikey']) {
            echo 'apikey OK <br/>';
            return true;
        }
        return false;
    }

    function checkUsername () {
        if($_SERVER['PHP_AUTH_USER'] == $GLOBALS['username']) {
            echo 'username OK <br/>';
            return true;
        }
        return false;
    }

    if(checkPassword() && checkUsername() && checkApikey()) {
        echo 'Authorized!';
    } else {
        echo 'not so much!';
    }