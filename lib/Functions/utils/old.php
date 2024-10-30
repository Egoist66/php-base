<?php


/**
 * Returns the value of the named input field from the previous request, 
 * sanitized and trimmed.
 * 
 * @param string $name
 * @return string|null
 */
function old(string $name = ''): string
{
    return sanitize(
        trim($_POST[$name] ?? '')
    ) ?? null;
}
