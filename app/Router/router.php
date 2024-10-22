<?php

require_once '../config/routes.map.php';
/**
 * Router function to handle different routes based on the URI.
 *
*/

function Router(\Lib\Classes\DB $db): void
{
    global $routes_map;
    $uri = request_uri()['uri'];
  

    if(isset(request_uri()['get']['id'])){
      
        $id = request_uri()['get']['id'];
       require_once CONTROLLERS . "/$routes_map[$uri]";
    }
    

    if (array_key_exists($uri, $routes_map) 
        && file_exists(CONTROLLERS . "/{$routes_map[$uri]}")) {
        require_once CONTROLLERS . "/$routes_map[$uri]";
    } else {
        abort();
    }
}
