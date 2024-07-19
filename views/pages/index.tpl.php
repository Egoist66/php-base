<?= view('layout->header', ['title' => $title]) ?>

<main class="main py-5">

    <div class="container">

        <?= view(
            'layout->main',
            ['posts' => $posts, 'recent_posts' => $recent_posts])
        ?>


    </div>

</main>

<?= view('layout->footer') ?>

