<script type="text/javascript" src="./public/js/statistics.js" defer></script>
<script type="text/javascript" src="./public/js/bookmarks.js" defer></script>



    <?php foreach($posts as $post): ?>
    <div class="post" id="<?= $post->getIdPost() ?>" >

        <div class="post-header">
            <div class="user-avatar">
                <img src="../public/uploads/user-default.jpg" alt="user-img">
            </div>
            <span class="username"><?= $post->getUserOwner()?> </span>
        </div>
        <div class="post-content">
            <img src="../public/uploads/<?= $post->getImage() ?>" alt="post-img">
            <p class="post-text"><?= $post->getTitle() ?>  </p>
            <p class="post-text"><?= $post->getDescription() ?> </p>
        </div>
        <div>
        <?
        
            if(isAuthor($post->getIdUserOwner()) && basename($_SERVER['REQUEST_URI']) == "myprofile"){
                echo '
                        <a href="/deletemypost?id='.$post->getIdPost().'" class="button">Delete That Post</a>
                ';
            }

            ?>

        <?php
            //require_once __DIR__.'/src/repository/PostRepository.php';
            $this->ratingRepository = new RatingRepository();
            $this->bookmarkRepository = new BookmarkRepository();
            
            $rate = $this->ratingRepository->getRatingScore(getIdUser(), $post->getIdPost());
            $book = $this->bookmarkRepository ->isBookmarkedByUser(getIdUser(), $post->getIdPost());

        ?>

        </div>
        <div class="post-footer">
            <div class="post-stats" id="<?= $post->getIdPost() ?>">
                <div class="main-stats post-icons-interactive" >
                
                    <div class="like-count like">
                        <i id="thumblike" class="material-symbols-outlined hover <?if($rate == 1){echo 'pressed';} ?>">thumb_up</i> 
                        <span id="likeNum"><?= $post->getLike() ?> </span>
                    </div>
                    <div class="dislike-count dislike">
                        <i id="thumbdislike" class="material-symbols-outlined thumb hover <?if($rate == -1){echo 'pressed';}?>">thumb_down</i>
                        <span id="dislikeNum"><?= $post->getDislike() ?></span>
                    </div>
                </div>

                <div class="bookmark-container post-icons-interactive">

                    <div class="bookmark-text">
                        <span id="bookmark-text" class="<?if($book){echo 'pressed';}?>"><?if($book){echo 'Bookmarked';}else{echo 'Bookmark';}?></span>
                    </div>

                    <div class="bookmark">
                        <i class="bookmark material-symbols-outlined hover <?if($book){echo 'pressed';}?>" id="bookmark">bookmark</i>
                    </div>
            
               
                </div>

            </div>  
        </div>
    </div>

    <?php endforeach; ?>

    