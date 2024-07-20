<?php

/**
 * Router function to handle different routes based on the URI.
 *
 * @param array $options An array containing route options.
 */
function Router(array $options): void {
    $uri = request_uri();


    switch($uri) {
        case '':
            $options['index']();
            break;
        case 'about':
            $options['about']();
            break;
        default:
            abort();
            break;
    }
}

