<?php

require_once '../config/routes.map.php';
/**
 * Router function to handle different routes based on the URI.
 *
 */

function Router(\Lib\Classes\DB $db): void
{
    global $routes_map;


    if (request('get')) {
        ['path' => $path, 'id' => $id] = request_uri()['uri'];
        $slug = explode('/', $path)[0] ?? null;

    
        if (isset($id) && is_numeric($id)) {

            require_once CONTROLLERS . "/{$routes_map[$slug]}";
            return;
           
        }
    

        //dump($path);


        if (
            array_key_exists($path, $routes_map)
            && file_exists(CONTROLLERS . "/{$routes_map[$path]}")
        ) {
            require_once CONTROLLERS . "/$routes_map[$path]";
            return;
        } else {
           
            abort(404);
        }

    } else {

        // abort(405);
    }
}
