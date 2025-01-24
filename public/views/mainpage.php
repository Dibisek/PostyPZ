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
            
                <div class="post">
                    <div class="post-header">
                        <div class="user-avatar">
                            <img src="/img/user.svg" alt="user-img">
                        </div>
                        <span class="username">Username</span>
                        <!-- <span class="post-date">12.12.2021</span> -->
                    </div>
                    <div class="post-content">
                        <img src="/img/post.jpg" alt="post-img">
                        <p class="post-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptates.</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-stats">
                            <div class="main-stats">
                                <div class="comment-count">
                                    <i class="fas fa-comment"></i>
                                    <span>12</span>
                                </div>
                                <div class="like-count">
                                    <i class="fas fa-thumbs-up"></i>
                                    <span>12</span>
                                </div>
                                <div class="dislike-count">
                                    <i class="fas fa-thumbs-down"></i>
                                    <span>12</span>
                                </div>
                            </div>
                            <div class="bookmark">
                                <i class="fas fa-bookmark"></i>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="post">
                    <div class="post-header">
                        <div class="user-avatar">
                            <img src="/img/user.svg" alt="user-img">
                        </div>
                        <span class="username">Username</span>
                        <!-- <span class="post-date">12.12.2021</span> -->
                    </div>
                    <div class="post-content">
                        <img src="/img/post.jpg" alt="post-img">
                        <p class="post-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptates.</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-stats">
                            <div class="main-stats">
                                <div class="comment-count">
                                    <i class="fas fa-comment"></i>
                                    <span>12</span>
                                </div>
                                <div class="like-count">
                                    <i class="fas fa-thumbs-up"></i>
                                    <span>12</span>
                                </div>
                                <div class="dislike-count">
                                    <i class="fas fa-thumbs-down"></i>
                                    <span>12</span>
                                </div>
                            </div>
                            <div class="bookmark">
                                <i class="fas fa-bookmark"></i>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="post">
                    <div class="post-header">
                        <div class="user-avatar">
                            <img src="/img/user.img" alt="user-img">
                        </div>
                        <span class="username">Username</span>
                        <!-- <span class="post-date">12.12.2021</span> -->
                    </div>
                    <div class="post-content">
                        <img src="/img/post.jpg" alt="post-img">
                        <p class="post-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptates.</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-stats">
                            <div class="main-stats">
                                <div class="comment-count">
                                    <i class="fas fa-comment"></i>
                                    <span>12</span>
                                </div>
                                <div class="like-count">
                                    <i class="fas fa-thumbs-up"></i>
                                    <span>12</span>
                                </div>
                                <div class="dislike-count">
                                    <i class="fas fa-thumbs-down"></i>
                                    <span>12</span>
                                </div>
                            </div>
                            <div class="bookmark">
                                <i class="fas fa-bookmark"></i>
                            </div>
                        </div>  
                    </div>
                </div>
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