<?php
require_once 'mailer.php';
require_once './lib/funciones.php';
// Establece el manejo de errores de PHP
ini_set('error_reporting', 0);

// PROCESO DE REGISTRO
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario y limpiar espacios en blanco
  require_once 'conexion.php';

  // Utiliza funciones de filtrado para asegurar datos limpios
  $user = trim($_POST["username"]);
  $nombre = trim($_POST["nombre"]);
  $apellidos = trim($_POST["apellidos"]);
  $email = trim($_POST["email"]);
  $contraseña = trim($_POST["contraseña"]);
  $confirmar_contraseña = trim($_POST["confirmpassword"]);
  $Token = generarToken();

  // Verificar si las contraseñas coinciden
  if ($contraseña !== $confirmar_contraseña) {
    echo '<div class="mensaje_error" id="message">Las contraseñas no coinciden.</div>';
  } else {
    // Validar la contraseña usando una función
    $validacionContraseña = validarContraseña($contraseña);
    if ($validacionContraseña !== true) {
      echo '<div class="mensaje_error" id="message">' . $validacionContraseña . '</div>';
    } else {
      // Validar y escapar los datos de entrada
      $user = filter_var($user, FILTER_SANITIZE_SPECIAL_CHARS);
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);

      // Crear una instancia de la clase Mailer
      $mailer = new Mailer();

      // Verificar si ya existe un usuario con el mismo nombre de usuario
      $select_stmt = $conn->prepare("SELECT UserID FROM users WHERE Username = ?");
      $select_stmt->bind_param("s", $user);
      $select_stmt->execute();
      $select_stmt->store_result();

      if ($select_stmt->num_rows > 0) {
        echo '<div class="mensaje_error" id="message">Ya existe un usuario con ese nombre de usuario.</div>';
      } else {
        // Verificar si ya existe un usuario con la misma dirección de correo electrónico
        if (checkIfEmailExists($conn, $email)->num_rows > 0) {
          echo '<div class="mensaje_error" id="message">Ya existe un usuario con esta dirección de correo electrónico.</div>';
        } else {
          // Utilizar password_hash() para cifrar la contraseña
          $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);

          // Insertar el nuevo usuario si no existe duplicado
          $insert_stmt = $conn->prepare("INSERT INTO users (Username, PrivilegioID, Nombre, Apellidos, Email, Password, Token) VALUES (?, 2, ?, ?, ?, ?, ?)");
          $insert_stmt->bind_param("ssssss", $user, $nombre, $apellidos, $email, $hashed_password, $Token);

          if ($insert_stmt->execute()) {
            $userID = mysqli_insert_id($conn);

            // Consulta e inserción para la tabla rankings
            $insert_ranking = $conn->prepare("INSERT INTO rankings (UserID, Score, Rank) VALUES (?, 0, 0)");
            $insert_ranking->bind_param("s", $userID);
            if (!$insert_ranking->execute()) {
              echo '<div class="mensaje_error" id="message">Error al insertar el usuario en la tabla rankings.</div>';
            }

            // Consulta e inserción para la tabla notificaciones
            $insert_notificaciones = $conn->prepare("INSERT INTO notificaciones (UserID) VALUES (?)");
            $insert_notificaciones->bind_param("s", $userID);
            if (!$insert_notificaciones->execute()) {
              echo '<div class="mensaje_error" id="message">Error al insertar el usuario en la tabla notificaciones.</div>';
            }

            // Consulta e inserción para la tabla perfil
            $insert_perfil = $conn->prepare("INSERT INTO perfil (UserID, Foto_perfil) VALUES (?, 'img/fotos_perfil/user_default.png')");
            $insert_perfil->bind_param("s", $userID);
            if (!$insert_perfil->execute()) {
              echo '<div class="mensaje_error" id="message">Error al insertar el usuario en la tabla perfil.</div>';
            }

            if (empty($errors)) {
              // Éxito al insertar en todas las tablas
              $url = 'http://localhost/CodeLoHubper/php/verify.php?user=' . $user . '&token=' . $Token;

              // Define el asunto y el cuerpo antes de usarlos
              $asunto = "Activar cuenta - CodeLoHubper";
              $cuerpo = "<h4>¡Hola " . ucfirst($user) . "!</h4>";
              $cuerpo .= "<p>¡Gracias por registrarte en CodeLoHubper! <br>Antes de comenzar, solo necesitamos confirmar que eres tú. <br><br>Haga clic a continuación para verificar su dirección de correo electrónico: </p>";
              $cuerpo .= "<a href='$url'>Activar cuenta</a>";

              if ($mailer->enviarEmail($email, $asunto, $cuerpo)) {
                // Éxito al enviar el correo electrónico
                echo '<div class="mensaje_ok" id="verify-message">El correo de verificación se ha enviado a la dirección: ' . $email . '</div>';
              } else {
                // Error al enviar el correo electrónico
                echo '<div class="mensaje_error" id="message">Ha ocurrido un error al enviar el correo. Asegúrate de que la dirección de correo sea válida.</div>';
              }
            } else {
              // Manejar los errores de inserción en las tablas aquí
            }
          } else {
            echo '<div class="mensaje_error" id="message">¡Lo siento, ha ocurrido un error al registrar al usuario!</div>';
          }
          // Si ocurre un error en la inserción de usuarios, no se guardarán los datos en la base de datos.
        }
      }
    }
  }
  $conn->close();
}
?>