<?php
require_once 'database_controller.php';
include_once 'user_table_maker.php';

$q = $_REQUEST["q"];

$result = get_users($q);

show_results($result);
