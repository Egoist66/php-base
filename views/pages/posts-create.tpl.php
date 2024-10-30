<?= view('layout->header', ['title' => $title]) ?>

<main class="main py-5">


    <div class="container">
        <div class="row">
            <form  method="post">
                <h2>New Post</h2>
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input value="<?= old('title') ?>" type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group mb-3">
                    <label for="excerpt">Excerpt</label>
                    <textarea class="form-control" id="excerpt" name="excerpt" rows="2"><?= old('excerpt') ?></textarea>
                </div>
              
                <div class="form-group mb-3">
                    <label for="content">Content</label>
                    <textarea  class="form-control" id="content" name="content" rows="5"><?= old('content') ?? '' ?></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>

    </div>

</main>

<?= view('layout->footer') ?>