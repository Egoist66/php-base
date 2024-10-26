<?php

require_once '../config/routes.map.php';
/**
 * Router function to handle different routes based on the URI.
 *
*/

function Router(\Lib\Classes\DB $db): void
{
    global $routes_map;
    [$path] = request_uri()['uri'];
    $id = request_uri()['uri'][1] ?? null;

    // dump($uri, true);
  
    if(isset($id)) {
      
       require_once CONTROLLERS . "/{$routes_map[$path]}";
    }
    

    if (array_key_exists($path, $routes_map) 
        && file_exists(CONTROLLERS . "/{$routes_map[$path]}")) {
        require_once CONTROLLERS . "/$routes_map[$path]";
    } else {
        abort();
    }
}
