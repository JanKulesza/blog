<?php
include 'config/database.php';
include 'templates/header.php';

$post_id = $_GET['id'];

$stmt = $conn->prepare("SELECT posts.title, posts.content, users.username, posts.created_at FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($title, $content, $username, $created_at);

if ($stmt->num_rows > 0) {
    $stmt->fetch();
    echo "<div class='post'>";
    echo "<h1>" . htmlspecialchars($title) . "</h1>";
    echo "<p>By " . htmlspecialchars($username) . " on " . $created_at . "</p>";
    echo "<p>" . htmlspecialchars($content) . "</p>";
    echo "</div>";
} else {
    echo "<p>Post not found!</p>";
}

$stmt->close();
?>

<div class='comment-form'>
    <form action="add-comment.php" method="POST">
        <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($post_id); ?>">
        <textarea name="content" placeholder="Comment" required></textarea>
        <button type="submit">Add Comment</button>
    </form>
</div>

<?php
$stmt = $conn->prepare("SELECT comments.content, users.username, comments.created_at FROM comments JOIN users ON comments.user_id = users.id WHERE comments.post_id = ? ORDER BY comments.created_at DESC");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<div class='comment'>";
    echo "<p>" . htmlspecialchars($row['content']) . "</p>";
    echo "<p>By " . htmlspecialchars($row['username']) . " on " . $row['created_at'] . "</p>";
    echo "</div>";
}

$stmt->close();
$conn->close();
?>

<?php include 'templates/footer.php'; ?>
