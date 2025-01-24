
<link rel="stylesheet" type="text/css" href="public/css/style.css">
<link rel="stylesheet" type="text/css" href="public/css/post.css">



<section class="posts">
    <?php if (!isset($posts) || !is_array($posts)): ?>
        <p>No posts available to display.</p>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div id="post-<?= htmlspecialchars($post->getIdPost()) ?>">
                <div>
                    <div class="post-desc">
                        <h1><a href="postpage?id=<?= htmlspecialchars($post->getIdPost()) ?>">
                            <?= htmlspecialchars($post->getTitle()) ?>
                        </a></h1>
                        <h2><?= htmlspecialchars($post->getUserOwner()) ?></h2>
                        <p><?= htmlspecialchars($post->getDescription()) ?></p>
                        <span><?= htmlspecialchars($post->getCreatedAt()) ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>



<template id="post-template">

<div id="" >

    <img src="" alt="post image">
    <div>


        <div class="post-desc">
            <h1><a href="" id="title-t"> title </a></h1>
            <h1 id="username-t"> username </h1>

            <p id="desc-t"> desc</p>
        </div>
        


        <div class=" post-icons">
            <div>
                <i class="material-symbols-outlined" >signal_cellular_alt</i>
                <span id="diff">difficulty</span>
            </div>
            <div>
                <i class="material-symbols-outlined" >thumb_up</i>
                <span id="like">like</span>
            </div>
            <div>
                <i class="material-symbols-outlined">timer</i>
                <span id="time">time</span>
            </div>
            <div>
                <i class="material-symbols-outlined">Restaurant</i>
                <span id="ser_num">for ser_num</span>
            </div>

        </div>
    </div>

</div>


</template>