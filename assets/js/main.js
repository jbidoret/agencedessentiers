console.log(
  // "L’Agence des sentiers accueille les chemins les plus improbables, les détours les plus féconds, les curiosités les plus vives. Bienvenue !"
);

// highlight nav links on scroll
window.addEventListener("DOMContentLoaded", () => {
  // Fonction exécutée au redimensionnement
  function resize() {
    if ("matchMedia" in window) {
      // Détection
      if (window.matchMedia("(min-width:600px)").matches) {
        const observer = new IntersectionObserver((entries) => {
          entries.forEach((entry) => {
            const id = entry.target.getAttribute("id");
            if (entry.intersectionRatio > 0) {
              const a = document.querySelector(`#nav li a[href="#${id}"]`);
              if (a) a.parentElement.classList.add("active");
            } else {
              const a = document.querySelector(`#nav li a[href="#${id}"]`);
              if (a) a.parentElement.classList.remove("active");
            }
          });
        });

        // Track all sections that have an `id` applied
        document.querySelectorAll(".text[id]").forEach((section) => {
          observer.observe(section);
        });
      }
    }
  }
  window.addEventListener("resize", resize, false);
  resize();
});
