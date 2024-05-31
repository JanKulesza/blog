<?php include '../templates/header.php'; ?>
<form action="../login.php" method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
<?php include '../templates/footer.php'; ?>
