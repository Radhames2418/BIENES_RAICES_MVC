/*jshint esversion: 11 */

document.addEventListener("DOMContentLoaded", function () {
  eventListeners();
  darkmode();
});

function darkmode() {
  const botonDarkMode = document.querySelector(".dark-mode-boton");
  botonDarkMode.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");
  });
}

window.addEventListener("resize", EliminarDimension);

function eventListeners() {
  const mobileMenu = document.querySelector(".mobile-menu");
  mobileMenu.addEventListener("click", navegacionResponsive);

  //Muestra campos conndicionales
  const metodoContacto = document.querySelectorAll(
    'input[name="contacto[contacto]"]'
  );
  metodoContacto.forEach((input) =>
    input.addEventListener("click", mostrarMetodosContacto)
  );
}

function navegacionResponsive(params) {
  const navegacionPrincipal = document.querySelector(".navegacion");

  if (navegacionPrincipal.classList.contains("mostrar")) {
    navegacionPrincipal.classList.remove("mostrar");
  } else {
    navegacionPrincipal.classList.add("mostrar");
  }
}

function EliminarDimension() {
  const navegacionPrincipal = document.querySelector(".navegacion");
  if (window.innerWidth >= 768) {
    navegacionPrincipal.classList.remove("mostrar");
  } else {
    navegacionPrincipal.classList.add("mostrar");
  }
}

function mostrarMetodosContacto(e) {
  const conctatoDiv = document.querySelector("#contacto");
  if (e.target.id === "contactar-email") {
    conctatoDiv.innerHTML = `
    <label for="email">E-mail</label>
    <input type="email" id="email" placeholder="Tu email" name="contacto[email]" require>
    `
  } else {
    conctatoDiv.innerHTML = `
    <label for="telefono">Telefono</label>
    <input type="tel" id="telefono" placeholder="Tu telefono" name="contacto[telefono]">
    <p>Eliga la fecha y la hora para ser conctado</p>

    <label for="fecha">Fecha</label>
    <input name="contacto[fecha]" type="date" id="fecha">

    <label for="hora">Hora</label>
    <input name="contacto[hora]" type="time" id="hora" min="09:00" max="18:00">
    `
  }
}
