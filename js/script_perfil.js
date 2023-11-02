document.addEventListener("DOMContentLoaded", function () {
  const perfilMenu = document.querySelector(".perfil-menu");
  const menuContent = perfilMenu.querySelector(".menu-content");
  const menuToggle = document.querySelector("#menu-toggle");

  // Abre o cierra el menú al hacer clic en el nombre de usuario
  perfilMenu.addEventListener("click", function (event) {
    if (event.target === menuToggle) {
      // Evita que se cierre inmediatamente al hacer clic en el botón de radio
      event.stopPropagation();
    }

    if (menuContent.style.display === "block") {
      menuContent.style.display = "none";
    } else {
      menuContent.style.display = "block";
    }
  });

  // Cierra el menú si se hace clic en cualquier parte fuera de él
  document.addEventListener("click", function (event) {
    if (event.target !== perfilMenu && !perfilMenu.contains(event.target)) {
      menuContent.style.display = "none";
    }
  });
});




document.addEventListener("DOMContentLoaded", function () {
  const header = document.querySelector("header");
  const nav = header.querySelector(".header-left nav");
  const hamburger = header.querySelector(".header-right .hamburger");
  const navLinks = header.querySelectorAll(".nav_link");

  // Variable para controlar el estado del menú
  let menuVisible = false;

  // Abre o cierra el menú al hacer clic en el ícono del menú (hamburger)
  hamburger.addEventListener("click", function (event) {
    if (menuVisible) {
      nav.classList.remove("active");
    } else {
      nav.classList.add("active");
    }
    menuVisible = !menuVisible;
  });

  // Cierra el menú al hacer clic en un enlace de navegación
  navLinks.forEach(function (link) {
    link.addEventListener("click", function () {
      nav.classList.remove("active");
      menuVisible = false;
    });
  });

  // Cierra el menú si se hace clic en cualquier parte fuera de él
  document.addEventListener("click", function (event) {
    if (!header.contains(event.target)) {
      nav.classList.remove("active");
      menuVisible = false;
    }
  });
});




const input = document.querySelector("#input");
const counter = document.querySelector(".counter"); 
const toggleButton = document.querySelector("#toggle");

let mode = "characters";

input.addEventListener("input", () => {
  let count = 0;

  if (mode === "characters") {
    count = input.value.length;

    counter.textContent = `${count} / 150`;
  } else {
  }
});


document.getElementById("inputFotoPerfil").addEventListener("change", function() {
  const fotoPerfil = document.getElementById("fotoPerfil");
  const formularioFotoPerfil = document.getElementById("formularioFotoPerfil");
  
  if (this.files && this.files[0]) {
      const reader = new FileReader();
      
      reader.onload = function(e) {
          fotoPerfil.src = e.target.result;
          formularioFotoPerfil.style.display = "block";
      };
      
      reader.readAsDataURL(this.files[0]);
  }
});