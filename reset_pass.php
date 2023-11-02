<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Restablecer contraseña | CodeLoHubper</title>

  <!-- CSS -->
  <link rel="stylesheet" href="./css/styleregister.css" />

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
          <h2>Restablecer contraseña</h2>

          <?php
          require_once './php/reset_password.php';
          ?>

          <!-- Contraseña -->
          <div class="input_box">
            <input type="password" name="contraseña" placeholder="contraseña" id="password password_request" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>

          <!-- Confirmar Contraseña -->
          <div class="input_box">
            <input type="password" name="confirmar_password" placeholder="Confirmar contraseña" id="password_request"
              required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>

          <button class="button" name="btningresar" type="submit">
            Enviar
          </button>
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

  <script src="./js/script_foto_perfil.js"></script>
  <script src="./js/script_message.js"></script>
  <script src="./js/script_password.js"></script>

  <script src="./js/pre_loader.js"></script>
  <script src="./js/script_perfil.js" ></script>
  <script src="./js/isotope.min.js"></script>
</body>

</html>