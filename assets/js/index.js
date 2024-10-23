const header = document.querySelector("header");
const menuToggle = document.getElementById("menuToggle");
const mobileMenu = document.getElementById("mobileMenu");
let isMenuOpen = false;

window.addEventListener("scroll", () => {
  if (window.scrollY > 50) {
    header.classList.add("shadow-md"); // Add shadow
  } else {
    header.classList.remove("shadow-md"); // Remove shadow
  }
});

// Toggle mobile menu
const toggleMenu = () => {
  isMenuOpen = !isMenuOpen;
  if (isMenuOpen) {
    mobileMenu.classList.remove("translate-x-full");
    mobileMenu.classList.add("translate-x-0");
  } else {
    mobileMenu.classList.remove("translate-x-0");
    mobileMenu.classList.add("translate-x-full");
  }
};

// Handle submenu toggle
const subMenuToggles = document.querySelectorAll("#mobileMenu .relative > a");
subMenuToggles.forEach((toggle) => {
  toggle.addEventListener("click", (e) => {
    e.preventDefault();
    const subMenu = toggle.nextElementSibling;
    subMenu.classList.toggle("hidden");
    // Toggle the rotation of the dropdown arrow
    const arrow = toggle.querySelector("svg");
    if (arrow) {
      arrow.classList.toggle("rotate-90");
    }
  });
});

// Close mobile menu on Escape key
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape" && isMenuOpen) {
    mobileMenu.classList.remove("translate-x-0");
    mobileMenu.classList.add("translate-x-full");
    isMenuOpen = false;
  }
});

// Close mobile menu when clicking outside
document.addEventListener("click", (e) => {
  if (isMenuOpen && !mobileMenu.contains(e.target) && e.target !== menuToggle) {
    mobileMenu.classList.remove("translate-x-0");
    mobileMenu.classList.add("translate-x-full");
    isMenuOpen = false;
  }
});
