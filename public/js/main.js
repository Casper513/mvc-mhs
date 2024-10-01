// Add any custom JavaScript functionality here
document.addEventListener('DOMContentLoaded', function() {
  // Example: Add a class to the active navigation link
  const currentLocation = window.location.href;
  const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
  navLinks.forEach(link => {
      if (link.href === currentLocation) {
          link.classList.add('active');
      }
  });
});