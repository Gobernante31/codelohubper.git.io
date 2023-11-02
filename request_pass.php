<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recuperar Contraseña | CodeLoHubper</title>

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" type="text/css" href="./css/styles.css" />

  <!--——————————————— CSS ———————————————-->
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
          <h2>Recuperar contraseña</h2>

          <?php
          require_once './php/request_password.php';
          ?>


          <div class="input_box">
            <input type="email" name="email" placeholder="correo electrónico" required />
            <i class="uil uil-envelope-alt email"></i>
          </div>
          <button class="button" name="btningresar" type="submit">
            Enviar
          </button>
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

  <script src="./js/script_message.js"></script>
  <script src="./js/script_password.js"></script>
  <script src="./js/script_perfil.js"></script>

  <script src="./js/pre_loader.js"></script>
  <script src="./js/isotope.min.js"></script>

</body>

</html>