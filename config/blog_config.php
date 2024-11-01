<?php


/**
 * Configuration for blog settings.
 *
 * This configuration array includes options such as the allowed HTML tags
 * that can be used within blog posts.
 *
 * @var array $blog_options
 */

global $blog_options;
$blog_options = [
    "allowed_tags"  => [
        'a',
        'b',
        'em',
        'i',
        'strong',
        'br',
        'hr',
        'ul',
        'ol',
        'li',
        'p',
        'h1',
        'h2',
        'h3',
        'h4',
        'h5',
        'h6',
        'blockquote',
    ]
];