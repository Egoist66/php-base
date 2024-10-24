<?php


/**
 * Aborts the script execution and returns a given HTTP code.
 *
 * @param int $code The HTTP status code to return.
 *
 * @return void
 */
function abort(int $code = 404): void {
    http_response_code($code);
    if(file_exists("../app/Controllers/{$code}.php")){
        require_once "../app/Controllers/{$code}.php";
        return;
    }
}