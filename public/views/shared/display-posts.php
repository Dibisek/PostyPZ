

    <?php foreach($posts as $post): ?>
    <div class="post" id="<?= $post->getIdPost() ?>" >

        <div class="post-header">
            <div class="user-avatar">
                <img src="../public/uploads/<?= $post->getImage() ?>" alt="user-img">
            </div>
            <span class="username"><?$post->getUserOwner()?></span>
        </div>
        <div class="post-content">
            <img src="/img/post.jpg" alt="post-img">
            <p class="post-text"><?= $post->getTitle() ?>  </p>
            <p class="post-text"><?= $post->getDescription() ?> </p>
        </div>
        <div class="post-footer">
            <div class="post-stats">
                <div class="main-stats">
                
                    <div class="like-count">
                        <i class="fas fa-thumbs-up"></i>
                        <span><?= $post->getLike() ?></span>
                    </div>
                    <div class="dislike-count">
                        <i class="fas fa-thumbs-down"></i>
                        <span><?= $post->getDislike() ?></span>
                    </div>
                </div>
                <div class="bookmark">
                    <i class="fas fa-bookmark"></i>
                </div>
            </div>  
        </div>
    </div>

    <?php endforeach; ?>

    