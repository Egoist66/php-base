<?php



$posts = array(
    [
        'img' => 'https://via.placeholder.com/300',
        'title' => 'Exciting News!',
        'content' => 'Check out the latest updates on our website.',
        'url' => '#exciting-news',
    ],
    [
        'img' => 'https://via.placeholder.com/300',
        'title' => 'Special Offer Inside!',
        'content' => 'Don\'t miss out on our limited-time promotion.',
        'url' => '#special-offer',
    ],
    [
        'img' => 'https://via.placeholder.com/300',
        'title' => 'New Product Launch!',
        'content' => 'Discover our innovative new product and its features.',
        'url' => '#new-product-launch',
    ],
    [
        'img' => 'https://via.placeholder.com/300',
        'title' => 'Event Announcement!',
        'content' => 'Join us for an exclusive event next week.',
        'url' => '#event-announcement',
    ]
);


$recent_posts = array(
    [
        'title' => 'Recent Post 1',
        'url' => strtolower(str_replace(' ', '-', 'Recent Post 1')),
    ],
    [
        'title' => 'Recent Post 2',
        'url' => strtolower(str_replace(' ', '-', 'Recent Post 2')),
    ],
    [
        'title' => 'Recent Post 3',
        'url' => strtolower(str_replace(' ', '-', 'Recent Post 3')),
    ],
    [
        'title' => 'Recent Post 4',
        'url' => strtolower(str_replace(' ', '-', 'Recent Post 4')),
    ],

);

$title = "MyBlog :: Home";

require_once PAGES_PATH.'/index.tpl.php';
