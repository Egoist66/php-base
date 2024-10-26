<?= view('layout->header', ['title' => $title]) ?>

    <main class="main py-5">


        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1><?= sanitize($post['title']) ?></h1>
                    <div class="post-content">
                        <?= sanitize($post['content'])?>
                    </div>
                </div>
               
        </div>

    </main>

<?= view('layout->footer') ?>
