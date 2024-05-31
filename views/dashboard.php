<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../templates/header.php';
?>

<main>

    <?php
    include '../config/database.php';
    $stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $username = $result->fetch_assoc()['username'];
    echo ("<h1>Hello $username!</h1>");
    ?>

    <a href="add-post.php">Add New Post</a>
    <?php
    include '../config/database.php';

    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        // if not redirect to the login page
        header("Location: login.php");
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM posts WHERE user_id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<div class='post'>";
        echo "<h2>" . $row['title'] . "</h2>";
        echo "<p>" . $row['content'] . "</p>";
        echo "<a href='http://localhost/05-25-2024-blog-php/post.php?id=" . $row['id'] . "'>View Post</a>";
        echo "</div>";
    }

    $stmt->close();

    include '../templates/footer.php';
    ?>