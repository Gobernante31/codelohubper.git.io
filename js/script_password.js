const pwShowHide = document.querySelectorAll(".pw_hide");
pwShowHide.forEach((icon) => {
  icon.addEventListener("click", () => {
    let getPwInput = icon.parentElement.querySelector("input");
    if (getPwInput.type === "password") {
      getPwInput.type = "text";
      icon.classList.replace("uil-eye-slash", "uil-eye");
    } else {
      getPwInput.type = "password";
      icon.classList.replace("uil-eye", "uil-eye-slash");
    }
  });
});

// Función para verificar la seguridad de la contraseña
function verificarContraseña() {
  const contraseña = document.getElementById("password").value;
  const contraseñaSegura = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[a-zA-Z]).{8,}$/;

  if (contraseñaSegura.test(contraseña)) {
    document.getElementById("password_message").style.display = "none";
  } else {
    document.getElementById("password_message").style.display = "block";
  }
}

// Agregar un evento al campo de contraseña para verificar la seguridad de la contraseña
const campoContraseña = document.getElementById("password");
campoContraseña.addEventListener("input", verificarContraseña);