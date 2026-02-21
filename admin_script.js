// admin_script.js

const tableBody = document.querySelector("#canteenTable tbody");
const days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

window.addEventListener("DOMContentLoaded", () => {
  const stored = JSON.parse(localStorage.getItem("canteenTimetable")) || {};

  days.forEach((day, i) => {
    const row = tableBody.rows[i];
    const meals = stored[day] || { breakfast: "", lunch: "", snacks: "",dinner: "" };
    row.cells[1].textContent = meals.breakfast;
    row.cells[2].textContent = meals.lunch;
    row.cells[3].textContent = meals.snacks;
    row.cells[4].textContent = meals.dinner;
  });
});

function saveTimetable() {
  const data = {};
  days.forEach((day, i) => {
    const row = tableBody.rows[i];
    data[day] = {
      breakfast: row.cells[1].textContent.trim(),
      lunch: row.cells[2].textContent.trim(),
      snacks: row.cells[3].textContent.trim(),
      dinner: row.cells[4].textContent.trim(),
    };
  });

  localStorage.setItem("canteenTimetable", JSON.stringify(data));
  alert("Timetable saved successfully!");
}
alert("✅ Timetable has been saved!");
