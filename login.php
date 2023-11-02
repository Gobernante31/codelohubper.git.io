<?php
session_start();

ini_set('error_reporting', 0);

if (isset($_SESSION['UserID'])) {
  header("Location: home.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar sesión | CodeLoHubper</title>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="./css/styles.css" />
  <link rel="stylesheet" type="text/css" href="./css/stylelogin.css" />

  <!-- FAVICON -->
  <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="64x64" />

  <!-- REMIXICONS -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

  <!-- ICONSCOUT -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body class="background_body hidden" style="background-image: url(./img/logo.png)">
  <!-- —————————— PRELOADER —————————— -->
  <div class="pre_loader" id="pre_loader">
    <div class="loader">
      <div class="head"></div>

      <div class="flames">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
      </div>

      <div class="eye"></div>
    </div>
  </div>
  <!-- —————————— FIN_PRELOADER —————————— -->
    

  <div class="home">
    <div class="form_container">
      <div class="login_form">
        <form action="" method="post">
          <h2>Iniciar sesión</h2>

          <!-- Mensajes de verificación -->
          <?php
          require_once './php/controlador_login.php';

          if (isset($_GET['verification'])) {
            $verification = $_GET['verification'];

            if ($verification === 'success') {
              echo '<div class="mensaje_ok" id="verify-message">¡Tu cuenta ha sido verificada con éxito!</div>';
            } elseif ($verification === 'error') {
              echo '<div class="mensaje_error" id="error-message">Hubo un problema al verificar tu cuenta o tu cuenta ya ha sido activada.</div>';
            }
          }

          if (isset($_GET['reset-ps'])) {
            $resetps = $_GET['reset-ps'];

            if ($resetps === 'success') {
              echo '<div class="mensaje_ok" id="verify-message">La contraseña se restableció con éxito.</div>';
            }
          }
          ?>

          <!-- Correo Electrónico -->
          <div class="input_box">
            <input type="email" name="email" placeholder="Correo Electrónico" value="<?php echo $_POST['email']; ?>"
              required />
            <i class="uil uil-envelope-alt email"></i>
          </div>

          <!-- Contraseña -->
          <div class="input_box">
            <input type="password" name="password" placeholder="Contraseña" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>

          <!-- Opciones -->
          <div class="option_field">
            <span class="checkbox">
              <input type="checkbox" id="check" />
              <label for="check">Recuérdame</label>
            </span>
            <a href="./request_pass.php" class="forgot_pw">Olvidé mi contraseña</a>
          </div>

          <!-- Botón de Inicio de Sesión -->
          <button class="button" name="btningresar" type="submit">
            Entrar
          </button>

          <!-- Enlaces de Registro e Inicio -->
          <div class="login_signup">
            ¿No tienes una cuenta? <a href="./register.php">Registrarse</a>
            <a href="./index.html">
              <i class="ri-home-2-line"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="./js/script_message.js"></script>
  <script src="./js/script_password.js"></script>
  <script src="./js/script_perfil.js"></script>

  <script src="./js/isotope.min.js"></script>
  <script src="./js/pre_loader.js"></script>

</body>

</html>