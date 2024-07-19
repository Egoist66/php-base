<?php

$linksMap = array(
    [
        'name' => 'Home',
        'slug' => 'php-base',
        'url' => '/',
    ],
    [
        'name' => 'About',
        'slug' => 'about',
        'url' => '/about.php',
    ],
);



?>


<nav class="navbar bg-primary navbar-expand-lg ">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <?php foreach ($linksMap as $link): ?>


                    <li class="nav-item">
                        <a class="<?= str_contains(basename($_SERVER['REQUEST_URI']), strtolower($link['slug'])) ? 'active nav-link' : 'nav-link' ?>"
                           aria-current="page"
                           href=/php-base<?= $link['url'] ?>><?= $link['name'] ?></a>
                    </li>

                <?php endforeach; ?>


            </ul>

        </div>
    </div>
</nav>

