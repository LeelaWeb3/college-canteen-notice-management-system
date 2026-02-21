<?php
session_start();
if ($_POST['username'] === 'ADMIN' && $_POST['password'] === '12345')
     {
  $_SESSION['admin'] = true;
  header("Location: admin_panel.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Failed</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-wrapper">
    <div class="login-box">
      <p style="color: #f77; text-align: center; font-weight: bold;">❌ Invalid credentials.</p>
      <a href="admin_login.php" style="display: block; text-align: center; color: #ffca80;">← Back to Login</a>
    </div>
  </div>
</body>
</html>
