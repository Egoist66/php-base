<?php

/**
 * Dump data to the screen for debugging purposes.
 *
 * @param mixed $data The data to be dumped.
 * @param bool $die Whether to stop script execution after dumping.
 */
function dump(mixed $data, bool $die = false): void
{
    if (!$data) {
        return;
    }
    if ($die) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die();
    }
    echo '<pre>';
    print_r($data);
    echo '</pre>';



}