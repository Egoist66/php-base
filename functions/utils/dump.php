<?php

/**
 * Dump data to the screen for debugging purposes.
 *
 * @param mixed $data The data to be dumped.
 * @param bool $die Whether to stop script execution after dumping.
 */
function dump(mixed $data, bool $die = false): void
{
   
    if ($die) {
        echo '<pre style="font-size: 18px; background-color: #000; color: #fff;padding: 10px;margin-bottom: 0px;">">';
        var_dump($data);
        echo '</pre>';
        die();
    }
    echo '<pre style="font-size: 18px; background-color: #000; color: #fff;padding: 10px; margin-bottom: 0px;">';
    var_dump($data);
    echo '</pre>';



}