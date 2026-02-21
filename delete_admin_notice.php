<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: admin_login.php");
  exit();
}

if (isset($_POST['index'])) {
  $index = (int)$_POST['index'];
  $file = "data/admin_notices.txt";
  if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES);
    if (isset($lines[$index])) {
      // Delete associated image if any
      if (preg_match('/\[img:(.*?)\]/', $lines[$index], $match)) {
        $imgPath = "uploads/" . $match[1];
        if (file_exists($imgPath)) unlink($imgPath);
      }

      unset($lines[$index]);
      file_put_contents($file, implode("\n", $lines));
    }
  }
}

header("Location: notice.php");
?>
