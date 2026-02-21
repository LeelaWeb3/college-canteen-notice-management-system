window.addEventListener("DOMContentLoaded", () => {
  const feedbackForm = document.querySelector("form[action='feedback.php']");
  if (feedbackForm) {
    feedbackForm.addEventListener("submit", () => {
      alert("Thank you for your feedback!");
    });
  }

  const todayMenuDiv = document.querySelector(".card h3 + p");
  if (todayMenuDiv) {
    const currentDay = days[today];
    todayMenuDiv.textContent = `Today is ${currentDay}: ${menuItems[currentDay] || 'No menu available.'}`;
  }
});
