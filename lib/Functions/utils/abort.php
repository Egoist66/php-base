<?php



/**
 * Abort the current request and return an error response with the given code.
 *
 * If a controller with the same name as the given code exists, it will be
 * required and its content will be sent as the response. Otherwise, an empty
 * response with the given code will be sent.
 *
 * @param int $code The HTTP status code to send. Defaults to 404.
 * @return void
 */
function abort(int $code = 404): void {
   
    if(file_exists("../app/Controllers/{$code}.php")){
        http_response_code($code);
        require_once "../app/Controllers/{$code}.php";
        return;
    }
    else {
        http_response_code($code);
        return;
    }
}