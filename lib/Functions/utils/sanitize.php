<?php

/**
 * Sanitize input data by encoding special characters and trimming whitespace.
 *
 * @param string $data The input data to be sanitized
 * @return string The sanitized data
 */
function sanitize(string $data, ?array $allowed_tags = null): string
{

    if(!$allowed_tags){
        return trim(htmlspecialchars($data));
    }

    $data = strip_tags(string: $data, allowed_tags: '<' . implode('><', array: $allowed_tags) . '>');

    return $data;
}
