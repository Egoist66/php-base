
<div class="row">
    <div class="col-md-8">
        <?php foreach ($posts as $postIndex => $post): ?>


            <?= view('./components->blog-card', ['post' => $post]) ?>

        <?php endforeach; ?>
    </div>
    <div class="col-md-4">
        <h3>Recent Posts</h3>
        <ul class="list-group">

            <?php foreach ($recent_posts as $post): ?>
                <li class="list-group-item">
                    <a href="post/<?= $post['id'] ?>"><?= sanitize($post['title'], $blog_options['allowed_tags']) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>