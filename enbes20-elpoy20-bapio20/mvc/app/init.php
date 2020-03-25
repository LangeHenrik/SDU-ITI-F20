<?php
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);

//define('URL_PUBLIC_FOLDER', 'public');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_PROTOCOL', '//');
// define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL',URL_PROTOCOL.URL_DOMAIN.'/enbes20-elpoy20-bapio20/mvc/public/');


require_once 'helpers/helper.php';
require_once 'core/Router.php';
require_once 'core/Database.php';
require_once 'core/Controller.php';
