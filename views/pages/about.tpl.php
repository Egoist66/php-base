<?= view('layout->header', ['title' => $title]) ?>

    <main class="main py-5">

        <div class="container">
            <?= $content ?>
        </div>

    </main>

<?= view('layout->footer') ?>
