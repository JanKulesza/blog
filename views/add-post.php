<?php include '../templates/header.php'; ?>
<form action="../add-post.php" method="POST">
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="content" placeholder="Content" required></textarea>
    <button type="submit">Add Post</button>
</form>
<?php include '../templates/footer.php'; ?>
