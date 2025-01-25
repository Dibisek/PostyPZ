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
            <?php include_once __DIR__ . '/shared/leftbar.php' ?>
            <section class="posts-feed">
            <?php include_once __DIR__ . '/shared/display-posts.php' ?>
            </section>
            <?php include_once __DIR__ . '/shared/rightbar.php' ?>
        </div>
    </body>