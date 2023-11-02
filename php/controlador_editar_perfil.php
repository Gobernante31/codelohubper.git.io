<?php
$userID = $_SESSION['UserID'];
// Establece el manejo de errores de PHP
ini_set('error_reporting', 1);

require_once 'conexion.php';
require_once './lib/funciones_editar_perfil.php';
require_once './lib/funciones.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verificar si se quiere cambiar el nombre de usuario
  if (!empty($_POST['username'])) {
    // Obtener la contraseña actual del formulario
    $currentPassword = $_POST['password'];

    // Verificar la contraseña actual utilizando la función
    if (verificarContraseñaActual($userID, $currentPassword, $conn)) {
      $newUsername = $_POST['username'];

      // Actualizar el nombre de usuario utilizando la función
      if (actualizarNombreUsuario($userID, $newUsername, $conn)) {
        echo '<div class="mensaje_ok" id="message">Nombre de usuario actualizado con éxito.</div>';
        $_SESSION['Username'] = $newUsername; // Actualizar la variable de sesión
      } else {
        echo '<div class="mensaje_error" id="message">Error al actualizar el nombre de usuario.</div>';
      }
    } else {
      echo '<div class="mensaje_error" id="message">La contraseña actual no es válida.</div>';
    }
  }

  // Verificar si se quiere cambiar la contraseña
  if (!empty($_POST['newPassword'])) {
    // Obtener la contraseña actual del formulario
    $currentPassword = $_POST['password'];

    // Verificar la contraseña actual utilizando la función
    if (verificarContraseñaActual($userID, $currentPassword, $conn)) {
      $newPassword = $_POST['newPassword'];

      // Validar la nueva contraseña utilizando la función
      $validacionContraseña = validarContraseña($newPassword);

      if ($validacionContraseña === true) {
        // Actualizar la contraseña utilizando la función
        if (actualizarContraseña($userID, $newPassword, $conn)) {
          echo '<div class="mensaje_ok" id="message">Se actualizó la contraseña correctamente.</div>';
        } else {
          echo '<div class="mensaje_error" id="message">Error al actualizar la contraseña.</div>';
        }
      } else {
        echo '<div class="mensaje_error" id="message">' . $validacionContraseña . '</div>';
      }
    } else {
      echo '<div class="mensaje_error" id="message">La contraseña actual no es válida.</div>';
    }
  }


// Verificar si se quiere cambiar la biografía
if (isset($_POST['presentacion'])) {
  $presentacion = $_POST['presentacion'];

  // Obtener la biografía actual desde la sesión
  $biografiaActual = $_SESSION['Presentacion'];

  // Verificar si se ha realizado un cambio en el texto de la biografía antes de actualizarla
  if ($presentacion !== $presentacionaActual) {
    // Asegurarse de que la biografía no esté vacía antes de actualizarla
    if (!empty($presentacion)) {
      // Verificar la longitud de la biografía
      if (strlen($presentacion) <= 150) {
        // Actualizar la biografía utilizando la función
        if (editarPresentacion($userID, $presentacion, $conn)) {
          echo '<div class="mensaje_ok" id="message">Biografía actualizada con éxito.</div>';
          $_SESSION['Presentacion'] = $presentacion; // Actualizar la variable de sesión
        } else {
          echo '<div class="mensaje_error" id="message">Error al actualizar la biografía.</div>';
        }
      } else {
        echo '<div class="mensaje_error" id="message">La biografía debe tener un máximo de 150 caracteres.</div>';
      }
    }
  }
}



  // Verificar si se quiere cambiar la foto de perfil
  if (!empty($_FILES['fotoperfil']['name'])) {
    // Directorio donde se almacenarán las imágenes de perfil
    $uploadDir = "img/fotos_perfil/";

    // Nombre como se guarda el archivo de imagen
    $extension = pathinfo($_FILES['fotoperfil']['name'], PATHINFO_EXTENSION);
    $randomFileName = $userID . "_fotoperfil." . $extension;

    // Ruta completa del archivo
    $targetFilePath = $uploadDir . $randomFileName;

    // Verificar si la imagen se subió correctamente
    if (move_uploaded_file($_FILES['fotoperfil']['tmp_name'], $targetFilePath)) {
      // Actualizar la URL de la imagen de perfil en la base de datos
      $stmt = $conn->prepare("UPDATE perfil SET Foto_perfil = ? WHERE UserID = ?");
      $stmt->bind_param("si", $targetFilePath, $userID);
      if ($stmt->execute()) {
        echo '<div class="mensaje_ok" id="message">Foto de perfil actualizada con éxito.</div>';
      } else {
        echo '<div class="mensaje_error" id="message">Error al actualizar la foto de perfil.</div>';
      }
    } else {
      echo '<div class="mensaje_error" id="message">Error al subir la foto de perfil.</div>';
    }
  }
}
?>