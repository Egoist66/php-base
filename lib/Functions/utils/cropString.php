<?php

function cropString(string $string, int $length, string $cropFrom = 'end'): string {
    if (mb_strlen($string, 'UTF-8') <= $length) {
        return $string;
    }

    $croppedString = ($cropFrom === 'start') ? ' ' . mb_substr($string, -$length + 3, NULL, 'UTF-8') : mb_substr($string, 0, $length - 3, 'UTF-8') . ' ';
    return $croppedString;
}