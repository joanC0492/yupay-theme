export const initHeader = () => {
  // Header scroll effect
  const header = document.getElementById("header");
  window.addEventListener("scroll", () => {
    header.classList.toggle("scrolled", window.scrollY > 50);
  });

  // Mobile menu
  const navToggle = document.getElementById("navToggle");
  const navMenu = document.getElementById("navMenu");
  navToggle.addEventListener("click", () => navMenu.classList.toggle("active"));

  // Dropdown toggle for mobile
  const dropdownToggles = document.querySelectorAll(".nav-dropdown-toggle");
  dropdownToggles.forEach((toggle) => {
    toggle.addEventListener("click", (e) => {
      // Only prevent default and toggle on mobile
      if (window.innerWidth <= 968) {
        e.preventDefault();
        const parentLi = toggle.closest("li");
        parentLi.classList.toggle("dropdown-open");
      }
    });
  });

  // Close dropdown when clicking outside on mobile
  document.addEventListener("click", (e) => {
    if (window.innerWidth <= 968) {
      if (!e.target.closest(".nav-menu > li")) {
        document.querySelectorAll(".nav-menu > li").forEach((li) => {
          li.classList.remove("dropdown-open");
        });
      }
    }
  });

  // Smooth scroll
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({ behavior: "smooth", block: "start" });
        navMenu.classList.remove("active");
      }
    });
  });

  // Animate on scroll
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = "1";
          entry.target.style.transform = "translateY(0)";
        }
      });
    },
    { threshold: 0.1, rootMargin: "0px 0px -50px 0px" },
  );

  document
    .querySelectorAll(".area-card, .benefit-card, .docente-card")
    .forEach((el) => {
      el.style.opacity = "0";
      el.style.transform = "translateY(30px)";
      el.style.transition = "opacity 0.6s ease, transform 0.6s ease";
      observer.observe(el);
    });

  // Scroll animations
  const observerOptionsAreas = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  };

  const observerAreas = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
      }
    });
  }, observerOptionsAreas);

  document.querySelectorAll(".fade-in").forEach((el) => {
    observerAreas.observe(el);
  });
};
