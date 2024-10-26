<?php

$post = [];
$title = '';
if($post = $db->custom_query("SELECT * FROM posts WHERE id = $id")->find()){

    $title = "MyBlog - {$post['title']}";

    require_once PAGES_PATH . '/post.tpl.php';
    
  
}
else {
    $title = "MyBlog - 404 Not Found";
    require_once PAGES_PATH . '/post.tpl.php';
}


