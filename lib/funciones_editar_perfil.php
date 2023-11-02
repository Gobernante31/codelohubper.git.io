<?php
require_once 'conexion.php';


// Función para verificar la contraseña actual.
function verificarContraseñaActual($userID, $currentPassword, $conn)
{
    $stmt = $conn->prepare("SELECT Password FROM users WHERE UserID = ?");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($storedPassword);
        $stmt->fetch();

        // Verificar si la contraseña actual coincide.
        return password_verify($currentPassword, $storedPassword);
    }

    return false;
}

// Función para actualizar el nombre de usuario.
function actualizarNombreUsuario($userID, $newUsername, $conn)
{
    $stmt = $conn->prepare("UPDATE users SET Username = ? WHERE UserID = ?");
    $stmt->bind_param("si", $newUsername, $userID);

    if ($stmt->execute()) {
        return true;
    }

    return false;
}

// Función para actualizar la contraseña.
function actualizarContraseña($userID, $newPassword, $conn)
{
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET Password = ? WHERE UserID = ?");
    $stmt->bind_param("si", $hashedPassword, $userID);

    if ($stmt->execute()) {
        return true;
    }

    return false;
}

// Función para editar la biografia.
function editarPresentacion($userID, $presentacion, $conn)
{
  $stmt = $conn->prepare("UPDATE perfil SET Presentacion = ? WHERE UserID = ?");
  $stmt->bind_param("si", $presentacion, $userID);

  if ($stmt->execute()) {
    return true;
  } else {
    return false;
  }
}
?>