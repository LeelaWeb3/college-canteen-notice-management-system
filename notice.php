<?php
$admin_file = "data/admin_notices.txt";
$student_file = "data/student_notices.txt";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Notice Board</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <h2>📢 Notice Board</h2>

  <h3>🔒 Admin Notices</h3>

  <?php
  if (file_exists($admin_file)) {
    $admin_notices = file($admin_file, FILE_IGNORE_NEW_LINES);
    foreach ($admin_notices as $n) {

      echo "<div style='margin-bottom:20px;background:#2a2a3d;padding:15px;border-radius:10px;'>";

      if (strpos($n, '[img:') !== false) {
        preg_match('/\[img:(.*?)\]/', $n, $match);
        $imgFile = $match[1];
        $text = str_replace($match[0], '', $n);

        echo "<p>$text</p>";
        echo "<img src='uploads/$imgFile' style='max-width:300px;border-radius:10px;'>";
      } else {
        echo "<p>$n</p>";
      }

      echo "</div>";
    }
  } else {
    echo "<p>No admin notices.</p>";
  }
  ?>

  <hr>

  <h3>👥 Student Notices</h3>

  <?php
  if (file_exists($student_file)) {
    $student_notices = file($student_file, FILE_IGNORE_NEW_LINES);
    foreach ($student_notices as $n) {
      echo "<p>$n</p>";
    }
  } else {
    echo "<p>No student notices.</p>";
  }
  ?>

  <hr>

  <h3>✍️ Post a Student Notice</h3>

  <form method="POST" action="post_student_notice.php">
    <textarea name="notice" placeholder="Enter your notice..." required></textarea>
    <button type="submit">Post Student Notice</button>
  </form>

  <br>
  <a href="admin_login.php">Admin Login</a>

</div>

</body>
</html>
