<?php

/**
 * Router function to handle different routes based on the URI.
 *
 */

function Router(\Lib\Classes\DB $db, array $routes_map): void
{


    if (request('get')) {
        ['path' => $path, 'id' => $id] = request_uri()['uri'];
        $slug = explode('/', $path)[0] ?? null;


        if (isset($id) && is_numeric($id)) {

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

    }


    if (request('post')) {
        switch (request_uri()['uri']['path']) {
            case 'posts/create':

                file_put_contents('log.txt', print_r($_POST, true), FILE_APPEND);


                $data = input(
                    ['title' => 'string', 'excerpt' => 'string', 'content' => 'string'], 
                    ['title', 'excerpt', 'content'],
                    fn() => require_once CONTROLLERS . '/posts-create.php'
                );


            
                if($data){
                    if ($db->custom_query("INSERT INTO posts (title, excerpt, content) VALUES (?, ?, ?)", [$data['title'], $data['excerpt'], $data['content']])) {
                        redirect('/');
                    }
    
                }

           
                break;

            default:
                abort(404);
        }
    }
}
