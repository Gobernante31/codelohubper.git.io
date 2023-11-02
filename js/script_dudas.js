document.getElementById("dudas-form").addEventListener("submit", function(event) {
    const nombre = document.getElementById("nombre").value;
    const email = document.getElementById("email").value;
    const dudas = document.getElementById("dudas").value;
    const acepta = document.getElementById("acepta").checked;

    if (!nombre || !email || !dudas || !acepta) {
        event.preventDefault(); 
        document.getElementById("mensaje-error").style.display = "block";
    }
});