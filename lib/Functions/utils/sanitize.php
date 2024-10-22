<?php


/**
 * Sanitize input data by encoding special characters and trimming whitespace.
 *
 * @param string $data The input data to be sanitized
 * @return string The sanitized data
 */
function sanitize(string $data): string
{
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return trim($data);
}
