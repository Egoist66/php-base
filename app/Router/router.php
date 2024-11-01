<?php

use Lib\Classes\Validator;

/**
 * Router function to handle different routes based on the URI.
 *
 */

function Router(\Lib\Classes\DB $db, array $routes_map): void
{

    global $blog_options;


    $validator = new Validator();



    if (request('get')) {
        ['path' => $path, 'id' => $id] = request_uri()['uri'];
        $slug = explode('/', $path)[0] ?? null;



        try {
            if (isset($id)) {

                require_once CONTROLLERS . "/{$routes_map[$slug]}";
                return;

            }


            if (
                array_key_exists($path, $routes_map)
                && file_exists(CONTROLLERS . "/{$routes_map[$path]}")
            ) {
                require_once CONTROLLERS . "/$routes_map[$path]";
                return;
            } else {

                abort(404);
            }
        } catch (Exception $e) {
            abort(404);
        }


    }


    if (request('post')) {

        switch (request_uri()['uri']['path']) {
            case 'posts/create':

                //file_put_contents('log.txt', print_r($_POST, true), FILE_APPEND);


                $data = input(
                    ['title' => 'string', 'excerpt' => 'string', 'content' => 'string'],
                    ['title', 'excerpt', 'content'],
                    errorHandler: fn() => require_once CONTROLLERS . '/posts-create.php'
                );


                if ($data) {
                    if (
                        $db->custom_query(
                            "INSERT INTO posts (`title`, `excerpt`, `content`) VALUES (:title, :excerpt, :content)",
                            $data
                        )
                    ) {

                        redirect('/');
                    } else {

                        redirect($_SERVER['HTTP_REFERER']);

                    }


                }


                break;

            default:

                abort(404);
        }
    }
}
