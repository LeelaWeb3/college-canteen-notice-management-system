<?php
if (trim($_POST['notice'])!=='') {
  $line="Student: ".trim($_POST['notice'])."\n";
  file_put_contents("data/student_notices.txt", $line, FILE_APPEND);
}
header("Location: notice.php");
?>
<link rel="stylesheet" href="style.css">
