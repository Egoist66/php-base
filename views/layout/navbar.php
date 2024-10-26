<?php

$linksMap = array(
    [
        'name' => 'Home',
        'slug' => 'php-base',
        'url' => '/',
    ],
  
    [
        'name' => 'New Post',
        'slug' => 'new-post',
        'url' => '/posts/create',
    ],

    [
        'name' => 'About',
        'slug' => 'about',
        'url' => '/about',
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
                        <a class="nav-link" href=<?= $link['url'] ?>><?= $link['name'] ?></a>
                    </li>

                <?php endforeach; ?>


            </ul>

        </div>
    </div>
</nav>