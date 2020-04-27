<?php

require_once 'core/Router.php';
require_once 'core/Database.php';
require_once 'core/Controller.php';
define("DOC_ROOT", implode("/",array_slice(explode("/", $_SERVER['REQUEST_URI']),0,4)));