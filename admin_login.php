<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-wrapper">
    <form class="login-box" action="admin_login_action.php" method="POST">
      <h2>🔐 Admin Login</h2>
      <input type="text" name="username" placeholder="Enter Username" required>
      <input type="password" name="password" placeholder="Enter Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
<style>
    /* style.css */

body {
  margin: 0;
  padding: 0;
  background-color: #121326;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.login-box {
  background: #1e1f3a;
  padding: 30px 40px;
  border-radius: 12px;
  box-shadow: 0 0 15px rgba(255, 203, 112, 0.4);
  width: 350px;
  text-align: center;
}

.login-box h2 {
  margin-bottom: 25px;
  color: #fdd28e;
}

.login-box input {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  background: #2b2c48;
  border: 1px solid #888;
  border-radius: 6px;
  color: #fff;
  font-size: 16px;
}

.login-box input::placeholder {
  color: #bbb;
}

.login-box button {
  padding: 10px 20px;
  background-color: #ffb84c;
  color: #000;
  border: none;
  border-radius: 6px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s;
}

.login-box button:hover {
  background-color: #ffd580;
}
</style>