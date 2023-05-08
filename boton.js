const menuToggle = document.querySelector('.menu-toggle');
const navbar = document.querySelector('.navbar');
const mobileMenu = document.querySelector('.mobile-menu');

menuToggle.addEventListener('click', () => {
  menuToggle.classList.toggle('active');
  navbar.classList.toggle('active');
  mobileMenu.classList.toggle('active');
});
