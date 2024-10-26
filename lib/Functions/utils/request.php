<?php 

/**
 * Check if the current request is of the given type.
 *
 * @param string $method The request method to check for. Defaults to 'get'.
 * @return bool True if the request is of the given type, false otherwise.
 */
function request(string $method = 'get'): bool {
    return $_SERVER['REQUEST_METHOD'] === strtoupper($method) ? true : false;
}

