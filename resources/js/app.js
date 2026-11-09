// Mobile menu logic
const menuToggle = document.getElementById("menu-toggle");
const mobileMenu = document.getElementById("mobile-menu");
const iconOpen = document.getElementById("icon-open");
const iconClose = document.getElementById("icon-close");

function setMenuState(isOpen) {
  mobileMenu.classList.toggle("hidden", !isOpen);
  iconOpen.classList.toggle("hidden", isOpen);
  iconClose.classList.toggle("hidden", !isOpen);
  menuToggle.setAttribute("aria-expanded", String(isOpen));
  menuToggle.setAttribute("aria-label", isOpen ? "Fechar menu" : "Abrir menu");
}

if (menuToggle && mobileMenu && iconOpen && iconClose) {
  // Open / close on button click
  menuToggle.addEventListener("click", () => {
    const isOpen = menuToggle.getAttribute("aria-expanded") === "true";
    setMenuState(!isOpen);
  });

  // Close when any link inside the mobile menu is clicked
  mobileMenu.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => setMenuState(false));
  });
}