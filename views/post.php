<?php include '../templates/header.php'; ?>
<?php
include '../config/database.php';

$post_id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo "<h1>" . $row['title'] . "</h1>";
    echo "<p>" . $row['content'] . "</p>";
} else {
    echo "Post not found!";
}

$stmt->close();
?>

<form action="../add-comment.php" method="POST">
    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
    <textarea name="content" placeholder="Comment" required></textarea>
    <button type="submit">Add Comment</button>
</form>

<?php
$stmt = $conn->prepare("SELECT * FROM comments WHERE post_id = ?");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<p>" . $row['content'] . "</p>";
    echo "</div>";
}

$stmt->close();
?>
<?php include '../templates/footer.php'; ?>
