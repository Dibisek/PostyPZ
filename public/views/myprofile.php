<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once __DIR__ . '/shared/head.php' ?>
        
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/mainpage.css">
        <title>Mainpage</title>
    </head>

    <body>
        <div class="content">
            <section class="leftbar">
                <div class="search-bar">
                    <input type="text" placeholder="Search" class="search-input">
                    <button class="search-button"><i class="fas fa-search"></i></button>
                </div>
                <div class="user-info">
                    <div class="user-avatar">
                        <img src="/img/user.svg" alt="user-img">
                    </div>
                    <span class="username">Username</span>
                </div>
                <div class="create-post">
                        <a href="addpost"><button class="post-button">Add Post</button></a>
                </div>
            </section>
            <section class="posts-feed">

                <?php include_once __DIR__ . '/shared/display-posts.php' ?>
            
            </section>
            <section class="rightbar">
                <img class="logo" src="/img/logo.svg" alt="logo">
                <div class="nav">
                    <a href="mainpage">
                        <i class="fas fa-home"></i>
                        Mainpage
                    </a>
                    <a href="myprofile">
                        <i class="fas fa-user"></i>
                        My profile
                    </a>
                    <a href="bookmarks">
                        <i class="fas fa-bookmark"></i>
                        Bookmarks
                    </a>
                    <a href="explore">
                        <i class="fas fa-compass"></i>
                        Explore
                    </a>
                    <a href="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </div>
            </section> 
        </div>
    </body>