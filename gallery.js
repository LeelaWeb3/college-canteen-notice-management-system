//using array for images..
const images = [
  { src: "images/building.jpg", caption: "Main Building" },
  { src: "images/garden.jpg", caption: "garden" },
  { src: "images/library.jpg", caption: "Library Hall" },
  { src: "images/lecture.jpg", caption: "Our Faculty" },
  { src: "images/canteen.jpg", caption: "Canteen Area" },
  { src: "images/logo.jpg", caption: "College Logo" },
  { src: "images/sports.jpg", caption: "sports" },
  { src: "images/student.jpg", caption: "students" }
];

// Load cards
const grid = document.getElementById("gallery-grid");

images.forEach(item => {
  const card = document.createElement("div");
  card.className = "gallery-card";

  const img = document.createElement("img");
  img.src = item.src;
  img.alt = item.caption;
  img.onerror = () => { img.src = "images/default.jpg"; };

  const caption = document.createElement("div");
  caption.className = "gallery-caption";
  caption.textContent = item.caption;

  card.appendChild(img);
  card.appendChild(caption);
  grid.appendChild(card);
});
