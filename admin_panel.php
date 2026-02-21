<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: admin_login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - Campus Cravings</title>
  <link rel="stylesheet" href="style.css">
  <style>
    h2 {
      text-align: center;
      margin-top: 40px;
      color: #ffca80;
    }
    table {
      margin-top: 20px;
    }
    textarea {
      resize: none;
    }
  </style>
</head>
<body>
  <div class="container">

    <!-- Header -->
    <h2>🍽️ Update Canteen Timetable</h2>
    <table id="canteen-table">
      <tr><th>Day</th><th>Breakfast</th><th>Lunch</th><th>Snacks</th></tr>
      <tr><td>Monday</td><td contenteditable="true">Idli</td><td contenteditable="true">rice,sambar,tomato,curd</td><td contenteditable="true">Samosa</td></tr>
      <tr><td>Tuesday</td><td contenteditable="true">Pongal</td><td contenteditable="true">rice,sambar,potato curry,dal,curd</td><td contenteditable="true">Pakoda</td></tr>
      <tr><td>Wednesday</td><td contenteditable="true">Puri</td><td contenteditable="true">rice,sambar,cabbage,dal,curd</td><td contenteditable="true">Pani puri</td></tr>
      <tr><td>Thursday</td><td contenteditable="true">Uthappam</td><td contenteditable="true">rice,sambar,potato cubes fry,dal,curd</td><td contenteditable="true">Chat</td></tr>
      <tr><td>Friday</td><td contenteditable="true">Bonda</td><td contenteditable="true">rice,sambar,drumstick,dal,curd</td><td contenteditable="true">Veg manchurian</td></tr>
      <tr><td>Saturday</td><td contenteditable="true">Dosa</td><td contenteditable="true">rice,sambar,brinjal,dal,curd</td><td contenteditable="true">Bajji</td></tr>
    </table>
    <br>
<button class="save-btn" onclick="saveTimetable()">💾 Save Timetable</button>
<style>
  .save-btn {
  display: block;
  margin: 40px auto 60px auto;
  padding: 14px 36px;
  background: linear-gradient(135deg, #ffb84c, #ffd580);
  color: #121225;
  font-weight: bold;
  font-size: 18px;
  border: none;
  border-radius: 12px;
  cursor: pointer;
  box-shadow: 0 0 15px rgba(255, 208, 100, 0.4);
  transition: all 0.3s ease;
  text-shadow: 1px 1px 1px #fff5d6;
}

.save-btn:hover {
  background: linear-gradient(135deg, #ffc766, #ffeaaa);
  box-shadow: 0 0 25px rgba(255, 220, 130, 0.6);
  transform: scale(1.05);
}

</style>

    <!-- Admin Notice Form -->
    <h2>📢 Post Admin Notice</h2>
    <form method="POST" action="post_admin_notice.php" class="notice-form" enctype="multipart/form-data" onsubmit="return previewNotice();">
      <textarea name="notice" placeholder="Enter your notice..." required></textarea>
      <input type="file" name="image" accept="image/*"><br><br>
      <button type="submit">➕ Post Notice</button>
    </form>

    <!-- Admin Notices With Delete -->
    <hr style="margin: 60px 0 30px;">
    <h2>🗂️ Posted Admin Notices</h2>
    <?php
    $admin_file = "data/admin_notices.txt";
    if (file_exists($admin_file)) {
      $admin_notices = file($admin_file, FILE_IGNORE_NEW_LINES);
      foreach ($admin_notices as $i => $n) {
        echo "<div style='margin-bottom: 25px; background: #2a2a3d; padding: 20px; border-radius: 12px;'>";
        if (strpos($n, '[img:') !== false) {
          preg_match('/\[img:(.*?)\]/', $n, $match);
          $imgFile = $match[1];
          $text = str_replace($match[0], '', $n);
          echo "<p style='color:#ffd;'>$text</p>";
          echo "<img src='uploads/$imgFile' alt='Notice Image' style='max-width:300px; margin-top:10px; border-radius:10px;'>";
        } else {
          echo "<p style='color:#fff;'>$n</p>";
        }
        echo "<form method='POST' action='delete_admin_notice.php' style='margin-top:10px;'>
                <input type='hidden' name='index' value='$i'>
                <button type='submit' class='delete-btn'>🗑 Delete</button>
              </form>";
        echo "</div>";
      }
    } else {
      echo "<p style='color: #aaa;'>No admin notices yet.</p>";
    }
    ?>

    <!-- Logout Link -->
    <br><a class="button logout" href="logout.php">🚪 Logout</a>
  </div>

  <!-- JS Save Timetable -->
  <script>
    function saveTimetable() {
      const table = document.getElementById("canteen-table");
      const rows = Array.from(table.rows).slice(1); // skip header
      const data = rows.map(row => ({
        day: row.cells[0].innerText,
        breakfast: row.cells[1].innerText,
        lunch: row.cells[2].innerText,
        snacks: row.cells[3].innerText
      }));
      localStorage.setItem("canteenTimetable", JSON.stringify(data));
      alert("Timetable saved successfully!");
    }

    function loadTimetable() {
      const saved = localStorage.getItem("canteenTimetable");
      if (saved) {
        const table = document.getElementById("canteen-table");
        const data = JSON.parse(saved);
        data.forEach((rowData, i) => {
          const row = table.rows[i + 1]; // +1 to skip header
          if (row) {
            row.cells[1].innerText = rowData.breakfast;
            row.cells[2].innerText = rowData.lunch;
            row.cells[3].innerText = rowData.snacks;
          }
        });
      }
    }

    function previewNotice() {
      const text = document.querySelector('textarea[name="notice"]').value.trim();
      const file = document.querySelector('input[type="file"]').files[0];
      let msg = "⚠️ Please confirm your notice:\n\n" + text;
      if (file) msg += `\n\nImage: ${file.name}`;
      return confirm(msg);
    }

    // Load timetable on page load
    window.onload = loadTimetable;
  </script>
</body>
</html>
