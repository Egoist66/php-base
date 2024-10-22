<?php

$post = $db->custom_query("SELECT * FROM posts WHERE id = $id")->find();

$title = "MyBlog :: Post";
require_once PAGES_PATH . '/post.tpl.php';