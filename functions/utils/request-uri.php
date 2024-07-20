<?php

/**
 * Returns the trimmed request URI from the server.
 *
 * @return string The trimmed request URI.
 */
function request_uri(): string {
    return trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');
}