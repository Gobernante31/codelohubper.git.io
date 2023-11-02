// Espera 5 segundos (5000 milisegundos) y luego oculta el mensaje de verificación
setTimeout(function() {
  var verificationMessage = document.getElementById("message");
  if (verificationMessage) {
      verificationMessage.style.display = "none";
    }
}, 5500); // Cambia este valor a la cantidad de milisegundos que desees


setTimeout(function() {
  var verificationMessage = document.getElementById("verify-message");
  if (verificationMessage) {
      verificationMessage.style.display = "none";
    }
}, 10000); // Cambia este valor a la cantidad de milisegundos que desees


setTimeout(function() {
  var verificationMessage = document.getElementById("error-message");
  if (verificationMessage) {
      verificationMessage.style.display = "none";
    }
}, 6000); // Cambia este valor a la cantidad de milisegundos que desees


// Agrega un evento clic al botón para mostrar el mensaje de error nuevamente
document.getElementById("show-error").addEventListener("click", function() {
  // Muestra el mensaje de error
  document.getElementById("error-message").style.display = "block";
  // Oculta el botón para mostrar el mensaje de error nuevamente
  this.style.display = "none";
  }
);

document.getElementById("mensaje-confirmacion").style.display = "block";