<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create/Edit Post</title>
</head>
<body>
    <h1>Create or Edit Post</h1>
    <form action="/post/save" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_post" value="<?php echo isset($post) ? $post->getIdPost() : ''; ?>">

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

        <div>
            <label for="author">Author:</label>
            <select id="author" name="id_user_owner">
                <?php foreach ($users as $user): ?>
                    <option value="<?php echo $user->getIdUser(); ?>" <?php echo (isset($post) && $post->getIdUserOwner() === $user->getIdUser()) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($user->getUsername()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit">Save</button>
    </form>
</body>
</html>
