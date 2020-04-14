<?php

require_once 'core/Router.php';
require_once 'core/Database.php';
require_once 'core/Controller.php';
$explode = explode("/", $_SERVER['REQUEST_URI']);
$slice = array_slice($explode,0,4);
$implode = implode("/",$slice);

define("DOC_ROOT", implode("/",array_slice(explode("/", $_SERVER['REQUEST_URI']),0,4)));
