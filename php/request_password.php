<?php
session_start();

require_once 'conexion.php';
require_once './lib/funciones.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email_ingresado = trim($_POST["email"]);

  // Llama a la función checkIfEmailExists y verifica si el correo existe
  if (checkIfEmailExists($conn, $email_ingresado)) {
    // El correo existe en la base de datos, realiza la consulta para obtener UserID y estado de Password_request
    $sql = $conn->prepare("SELECT UserID, Nombre, Password_request FROM users WHERE Email = ?");
    $sql->bind_param("s", $email_ingresado);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
      // Obtiene el UserID, el nombre y el estado de Password_request
      $row = $result->fetch_assoc();
      $userID = $row["UserID"];
      $nombre = $row["Nombre"];
      $passwordRequest = $row["Password_request"];

      if ($passwordRequest == 0) {
        // Generar token y solicitar restablecimiento de contraseña
        $token = solicitarPassword($userID, $conn);

        if ($token !== null) {
          // Incluir el archivo de la clase Mailer
          require './php/mailer.php';

          // Crear una instancia de la clase Mailer
          $mailer = new Mailer();

          // Contraseña restablecida correctamente, enviar correo electrónico
          $reset_url = 'http://localhost/CodeLoHubper/reset_pass.php?id=' . $userID . '&token=' . $token;
          $asunto = "Restablecer contraseña - CodeLoHubper"; // Asunto del correo
          $cuerpo = "<h4>Hola " . htmlspecialchars($nombre) . ", han solicitado restablecer la contraseña en CodeLoHubper.</h4>";
          $cuerpo .= "<p>Hemos recibido una solicitud para restablecer la contraseña de tu cuenta en CodeLoHubper. <br>Si no hiciste esta solicitud, puedes ignorar este mensaje. <br><br>Para restablecer tu contraseña, haz clic en el siguiente enlace: </p>";
          $cuerpo .= "<a href='$reset_url'>Restablecer contraseña</a>";

          if ($mailer->enviarEmail($email_ingresado, $asunto, $cuerpo)) {
            // Correo electrónico enviado con éxito
            echo '<div class="mensaje_ok" id="verify-message">El correo de recuperación se ha enviado a la dirección: ' . htmlspecialchars($email_ingresado) . '</div>';

            // Actualizar el estado de Password_request a 1 para indicar que se ha enviado un correo
            $updateSql = $conn->prepare("UPDATE users SET Password_request = 1 WHERE UserID = ?");
            $updateSql->bind_param("i", $userID);
            $updateSql->execute();
          } else {
            // Error al enviar el correo electrónico
            echo '<div class="mensaje_error" id="message">Hubo un error al enviar el correo electrónico.</div>';
          }
        } else {
          // Error al solicitar la contraseña
          echo '<div class="mensaje_error" id="message">Hubo un error al procesar la solicitud de restablecimiento de contraseña. Por favor, inténtalo de nuevo más tarde.</div>';
        }
      } else {
        // El usuario ya ha solicitado restablecer la contraseña
        echo '<div class="mensaje_error" id="message">Ya has solicitado restablecer la contraseña. Por favor, verifica tu correo electrónico.</div>';
      }
    } else {
      // Error al obtener información del usuario
      echo '<div class="mensaje_error" id="message">Hubo un error al obtener información del usuario.</div>';
    }
  } else {
    // El correo no existe en la base de datos
    echo '<div class="mensaje_error" id="message">La dirección de correo electrónico no existe en nuestra base de datos.</div>';
  }
  $conn->close();
}
?>