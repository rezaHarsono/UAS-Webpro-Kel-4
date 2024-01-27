<?php
    include_once('conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="login-container">
<h2>Login</h2>
<form action="login.php" method="post">
<div class="input-group">
    <button type="submit" name="admin_login" value="Login as Admin">Login as Admin</buttton>
</div>
<div class="input-group">
    <button type="submit" name="guest_login" value="Login as Dosen/Mahasiswa">Login as Dosen/Mahasiswa</button>
</div>
</form>
</div>
</body>
</html>
</html>