<?php
// Iniciar la sesión
session_start();
// Establecer el manejo de errores de PHP
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["password"])) {
  $email_ingresado = $_POST["email"];
  $contraseña_ingresada = $_POST["password"];

  // Incluir el archivo de conexión a la base de datos
  require_once 'conexion.php';

  // Consultar la base de datos para obtener el hash de contraseña y la columna de activación
  $stmt = $conn->prepare("SELECT UserID, Username, Password, Activacion FROM users WHERE Email = ?");
  $stmt->bind_param("s", $email_ingresado);
  $stmt->execute();
  $stmt->bind_result($userID, $username, $hashed_password, $activacion);
  $stmt->fetch();
  $stmt->close();

  if ($hashed_password && password_verify($contraseña_ingresada, $hashed_password)) {
    if ($activacion == 1) {
      $_SESSION['UserID'] = $userID;
      $_SESSION['Username'] = $username;
      header("Location: home.php"); // Redirigir a la página de inicio después de iniciar sesión
      exit();
    } else {
      echo '<div class="mensaje_error" id="message">Su cuenta aún no ha sido activada.</div>';
    }
  } else {
    echo '<div class="mensaje_error" id="message">Credenciales incorrectas.</div>';
  }
  $conn->close();
}
?>