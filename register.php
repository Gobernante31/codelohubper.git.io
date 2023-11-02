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
  <title>Registrarse | CodeLoHubper</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="./css/styleregister.css" />

  <!-- CSS -->
  <link rel="stylesheet" href="./css/styles.css" />

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
      <div class="register_form">
        <form action="" method="post">
          <h2>Registrarse</h2>

          <!-- Mensaje de éxito -->
          <?php
          require_once "./php/controlador_register.php";
          ?>

          <!-- Usuario -->
          <div class="input_box">
            <input type="text" name="username" placeholder="Usuario" id="username"
              value="<?php echo $_POST['username']; ?>" required />
            <i class="uil uil-user user"></i>
          </div>

          <!-- Nombre y Apellidos -->
          <div class="nombre-apellidos">
            <div class="input_box">
              <input type="text" name="nombre" placeholder="Nombre" id="nombre" pattern="[A-Za-zÁ-úÑñ\s]{1,25}"
                value="<?php echo $_POST['nombre']; ?>" required />
              <i class="uil uil-user user"></i>
            </div>
            <div class="input_box">
              <input type="text" name="apellidos" placeholder="Apellidos" id="apellidos" pattern="[A-Za-zÁ-úÑñ\s]{1,25}"
                value="<?php echo $_POST['apellidos']; ?>" required />
              <i class="uil uil-user user"></i>
            </div>
          </div>

          <!-- Correo Electrónico -->
          <div class="input_box">
            <input type="email" name="email" placeholder="Correo Electrónico" id="email"
              value="<?php echo $_POST['email']; ?>" required />
            <i class="uil uil-envelope-alt email"></i>
          </div>

          <!-- Contraseña -->
          <div class="input_box">
            <input type="password" name="contraseña" placeholder="Contraseña" id="password password_request" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>

          <!-- Mensaje de contraseña segura -->
          <div id="password_message" class="mensaje_ok" style="display: none;">
            La contraseña debe tener al menos una letra mayúscula, una letra minúscula, un dígito y un carácter
            especial. Debe tener al menos 8 caracteres de longitud.
          </div>

          <!-- Confirmar Contraseña -->
          <div class="input_box">
            <input type="password" name="confirmpassword" placeholder="Confirmar Contraseña" id="password_request"
              required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>

          <!-- Botón de Registro -->
          <button class="button" name="btningresar" type="submit">
            Registrarse
          </button>

          <!-- Enlaces de inicio de sesión y página principal -->
          <div class="login_signup">
            ¿Ya tienes una cuenta?
            <a href="./login.php">Iniciar sesión</a>
            <a href="./index.html">
              <i class="ri-home-2-line"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="./js/script_foto_perfil.js"></script>
  <script src="./js/script_message.js"></script>
  <script src="./js/script_password.js"></script>

  <script src="./js/pre_loader.js"></script>
  <script src="./js/isotope.min.js"></script>
</body>

</html>