const menuBtn = document.querySelector(".menu-icon");
const mobileNav = document.querySelector(".nav2");

menuBtn.addEventListener("click", () => {
    mobileNav.classList.toggle("active");
});