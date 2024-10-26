<?= view('layout->header', ['title' => $title]) ?>

    <main class="main py-5">


        <div class="container">
            <div class="row">
                <form action="/posts/create"  method="post">
                    <h2>New Post</h2>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                    </div>
                  
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
               
        </div>

    </main>

<?= view('layout->footer') ?>
