<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__.'/../vendor/autoload.php';

use Functions\Classes\DB;
require_once '../config/path-constants.php';
require_once '../functions/functions.php';
require_once '../app/Router/router.php';

$db = DB::getInstance(require '../functions/config/config.php');
Router($db);

