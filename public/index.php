<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__.'/../vendor/autoload.php';
require_once '../config/path-constants.php';
require_once '../lib/Functions/functions.php';
require_once '../app/Router/router.php';

prevent_fav();



use Lib\Classes\DB;


$db = DB::getInstance(require '../lib/config/config.php');
$db->getSqlQueries('Europe/Moscow');


Router($db);

