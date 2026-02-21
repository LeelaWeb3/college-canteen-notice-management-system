<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: admin_login.php");
  exit();
}

if (trim($_POST['notice']) !== '') {

  $line = "Admin: " . trim($_POST['notice']);
  $fileName = '';

  if (!empty($_FILES['image']['name'])) {

    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) mkdir($uploadDir);

    $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
    $targetPath = $uploadDir . $fileName;

    move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);

    $line .= " [img:$fileName]";
  }

  file_put_contents("data/admin_notices.txt", $line . "\n", FILE_APPEND);
}

header("Location: admin_panel.php");
?>
