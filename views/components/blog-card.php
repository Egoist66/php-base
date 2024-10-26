<div class="card w-100 mb-3" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= sanitize($post['title'])?></h5>
        <p>ID: <b><?= sanitize($post['id']) ?></b></p>
        <p class="card-text"><?= sanitize($post['excerpt'] )?></p>
        <a href="post/<?= sanitize($post['id'] )?>" class="link-primary">Read more</a>
    </div>
</div>