<?php
require_once '../conexion.php';
// Establece el manejo de errores de PHP
ini_set('error_reporting', 0);

if (isset($_GET['token'])) {
  $Token = $_GET['token'];

  // Buscar al usuario por el token en la base de datos
  $stmt = $conn->prepare("SELECT UserID, Token FROM users WHERE Token = ?");
  $stmt->bind_param("s", $Token);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    // Encontrado un usuario con el token
    $row = $result->fetch_assoc();
    $user_id = $row['UserID'];

    // Actualizar la columna Activacion a 1 y la columna Token a nulo
    $update_stmt = $conn->prepare("UPDATE users SET Activacion = 1, Token = NULL WHERE UserID = ?");
    $update_stmt->bind_param("i", $user_id);

    if ($update_stmt->execute()) {
      // Redirigir al usuario a la página de inicio de sesión con un parámetro de verificación de éxito
      $_SESSION['verification'] = 'success';
      header("Location: ../login.php?verification=success");
      exit;
    } else {
      // Redirigir al usuario a la página de inicio de sesión con un parámetro de verificación de error
      $_SESSION['verification'] = 'error';
      header("Location: ../login.php?verification=error");
      exit;
    }
  } else {
    // Redirigir al usuario a la página de inicio de sesión con un parámetro de verificación de error
    $_SESSION['verification'] = 'error';
    header("Location: ../login.php?verification=error");
    exit;
  }
} else {
  // Token no proporcionado
  echo "Token no proporcionado. Por favor, verifica el enlace.";
}

$conn->close();
?>