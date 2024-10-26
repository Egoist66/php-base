<?php




/**
 * Returns an array with the request URI data.
 *
 * @return array
 * @var array (
 *   @var array $uri
 *   @var string $uri.path The URI path.
 *   @var string $uri.id The ID of the URI, if present.
 *   @var string $query The query string of the URI.
 *   @var array $get The GET parameters of the URI.
 * )
 */
function request_uri(): array {
    return [
        "uri" => [
            "path" => preg_replace('/^\/(?!\/)/', '', $_SERVER['REQUEST_URI']),
            "id" => explode('/',preg_replace('/^\/(?!\/)/', '', $_SERVER['REQUEST_URI']))[1] ?? null
        ],
        "query" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY),
        "get" => $_GET
    ];
}
