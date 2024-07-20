<?php

require_once '../config/routes.map.php';
/**
 * Router function to handle different routes based on the URI.
 *
 * @param array $options An array containing route options.
 */

function Router(): void
{
    global $routes_map;

    $uri = request_uri();


    if(array_key_exists($uri, $routes_map)) {
        if(file_exists(CONTROLLERS . "/{$routes_map[$uri]}")) {
            require_once CONTROLLERS . "/{$routes_map[$uri]}";

        }
        else {
            abort();
        }

    } else {
        abort();
    }


}

