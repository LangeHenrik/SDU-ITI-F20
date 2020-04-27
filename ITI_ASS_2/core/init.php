<?php
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1', //localhost
        'username' => 'root',
        'password' => '',
        'db' => 'accounts'
    ),
    'remember' => array(
       'cookie_name' => 'hash',
       'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

//auto class loader
spl_autoload_register(function($class) {
    require_once ($_SERVER['DOCUMENT_ROOT'].'/classes/' . $class . '.php');
});

require_once ($_SERVER['DOCUMENT_ROOT'].'/functions/sanitize.php');