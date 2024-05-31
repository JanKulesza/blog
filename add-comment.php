<?php
include 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/05-25-2024-blog-php/views/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $post_id, $user_id, $content);

    if ($stmt->execute()) {
        header("Location: post.php?id=$post_id");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
