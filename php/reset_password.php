<?php
session_start();
error_reporting(0);

require_once 'conexion.php';
require_once './lib/funciones.php';

$userID = $_GET['id'] ?? $_POST['UserID'] ?? '';
$Token = $_GET['token'] ?? $_POST['Token_password'] ?? '';

// Redirige a la página de inicio de sesión si falta el ID de usuario o el token
if ($userID == '' || $Token == '') {
  header("Location: login.php");
  exit;
}

// Verifica si el token y el ID de usuario son válidos
if (!verificarTokenRequest($userID, $Token, $conn)) {
  header("Location: login.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $contraseña = trim($_POST["contraseña"]);
  $confirmar_contraseña = trim($_POST["confirmar_password"]);

  // Validar la contraseña utilizando la función validarContraseña
  $validacionContraseña = validarContraseña($contraseña);

  if ($contraseña !== $confirmar_contraseña) {
    echo '<div class="mensaje_error" id="message">Las contraseñas no coinciden.</div>';
  } elseif ($validacionContraseña !== true) {
    echo '<div class="mensaje_error" id="message">' . $validacionContraseña . '</div>';
  } else {
    // Genera un nuevo hash de contraseña
    $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);

    // Actualiza la contraseña en la base de datos y restablece los valores de token y solicitud
    $updateStmt = $conn->prepare("UPDATE users SET Password = ?, Token_password = NULL, Password_request = 0 WHERE UserID = ?");
    $updateStmt->bind_param("ss", $hashed_password, $userID);

    if ($updateStmt->execute()) {
      // Marca el restablecimiento de contraseña como exitoso
      $_SESSION['reset-ps'] = 'success';
      header("Location: login.php?reset-ps=success");
      exit;
    } else {
      echo '<div class="mensaje_error" id="message">Error al actualizar la contraseña.</div>';
    }
  }
} else {
  $conn->close();
}
?>