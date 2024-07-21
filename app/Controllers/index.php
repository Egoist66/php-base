<?php


$posts = $db->custom_query('SELECT * FROM posts')->findAll();
$recent_posts = $db->custom_query('SELECT * FROM posts ORDER BY id DESC LIMIT 3')->findAll();



$title = "MyBlog :: Home";

require_once PAGES_PATH . '/index.tpl.php';
