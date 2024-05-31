<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="http://localhost/05-25-2024-blog-php/public/css/styles.css">
</head>
<body>
<header>
    <h1>My Blog</h1>
    <nav>
        <a href="http://localhost/05-25-2024-blog-php/index.php">Home</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="http://localhost/05-25-2024-blog-php/views/dashboard.php">Dashboard</a>
            <a href="http://localhost/05-25-2024-blog-php/logout.php">Logout</a>
        <?php else: ?>
            <a href="http://localhost/05-25-2024-blog-php/views/login.php">Login</a>
            <a href="http://localhost/05-25-2024-blog-php/views/register.php">Register</a>
        <?php endif; ?>
    </nav>
</header>
