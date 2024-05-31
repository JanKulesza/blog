<?php
include 'config/database.php';
include 'templates/header.php';
?>
<main>
<h1>Blog</h1>

<?php
$stmt = $conn->prepare("SELECT posts.id, posts.title, posts.content, users.username, posts.created_at FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC");
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<div class='post'>";
    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
    echo "<p>By " . htmlspecialchars($row['username']) . " on " . $row['created_at'] . "</p>";
    echo "<p>" . substr(htmlspecialchars($row['content']), 0, 200) . "...</p>";
    echo "<a href='post.php?id=" . $row['id'] . "'>Read more</a>";
    echo "</div>";
}

$stmt->close();
$conn->close();
?>

<?php include 'templates/footer.php'; ?>
