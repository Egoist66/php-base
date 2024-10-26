<?php

$post = $db->custom_query("SELECT * FROM posts WHERE id = $id")->find();

if ($post) {
    $title = "MyBlog - {$post['title']}";
    require_once PAGES_PATH . '/post.tpl.php';
}
