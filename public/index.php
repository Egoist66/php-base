<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once '../functions/functions.php';
require_once '../app/Router/router.php';

//dump(request_uri());


Router([
    'index' => static fn() => require_once '../app/Controllers/index.php',
    'about' => static fn() => require_once '../app/Controllers/about.php',
    
]);

