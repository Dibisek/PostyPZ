<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once __DIR__ . '/shared/head.php' ?>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mainpage.css">
    <link rel="stylesheet" type="text/css" href="public/css/addpost.css">
    <title>Create Post</title>
</head>
<body>
    <div class="content">
        <?php include_once __DIR__ . '/shared/leftbar.php' ?>
        <section class="posts-feed">
        <h1>Create Post</h1>
        <form action="addpost" method="POST" enctype="multipart/form-data">
            <!-- <input type="hidden" name="id_post" value="<?php echo isset($post) ? $post->getIdPost() : ''; ?>"> -->

            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo isset($post) ? htmlspecialchars($post->getTitle()) : ''; ?>" required>
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required><?php echo isset($post) ? htmlspecialchars($post->getDescription()) : ''; ?></textarea>
            </div>

            <div>
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
                <?php if (isset($post) && $post->getImage()): ?>
                    <p>Current Image: <img src="/uploads/<?php echo $post->getImage(); ?>" alt="Post Image" style="max-width: 200px;"></p>
                <?php endif; ?>
            </div>


            <button type="submit">Save</button>
        </form>
        </section>
        <?php include_once __DIR__ . '/shared/rightbar.php' ?>
    </div>
</body>
</html>
