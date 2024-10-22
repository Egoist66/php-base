<?php



/**
 * Returns an array with the URI, query string and GET parameters of the current request
 *
 * @return array
 */

function request_uri(): array {
    return [
        "uri" => trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/'),
        "query" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY),
        "get" => $_GET
    ];
}
