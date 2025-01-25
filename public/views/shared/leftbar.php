<section class="leftbar">
    <div class="search-bar">
        <input type="text" placeholder="Search" class="search-input">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
    <div class="user-info">
        <div class="user-avatar">
            <img src="../public/uploads/user-default.jpg" alt="user-img">
        </div>
        <span class="username"><?= getUsername() ?></span>
    </div>
    <div class="create-post">
            <a href="addpost"><button class="post-button">Add Post</button></a>
    </div>
</section>